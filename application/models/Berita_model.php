<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public $perPage = 5;

    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('berita');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            'judul' => $post['judul'],
            'penulis' => $post['penulis'],
            'isi' => $post['isi'],
            'foto' => $post['lampiran'],
            'status' => 0,
            'seo_title' => slugify($post['judul']),
            'user_id' => userdata('id_user'),
            'kategori_id' => $post['kategori'],
            'date' => date('Y-m-d')
        ];
        $this->db->insert('berita', $params);
    }

    public function editPengajuan($post)
    {
        $params = [
            'judul' => $post['judul'],
            'isi' => $post['isi'],
            'status' => $post['status'],
            'featured' => $post['featured'],
            'choice' => $post['choice'],
            'thread' => $post['thread']
        ];

        if ($post['editor'] != null) {
            $params['editor'] = $post['editor'];
        } else {
            $params['editor'] = null;
        }

        $this->db->where('id_berita', $post['id_berita']);
        $this->db->update('berita', $params);
    }

    public function getFeatured()
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->where('featured', 'Y');
        $this->db->where('berita.isActive', 1);
        $this->db->order_by('berita.id_berita', 'desc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function getChoice()
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->where('choice', 'Y');
        $this->db->where('berita.isActive', 1);
        $this->db->order_by('berita.id_berita', 'desc');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function getThread()
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->where('thread', 'Y');
        $this->db->where('berita.isActive', 1);
        $this->db->order_by('berita.id_berita', 'desc');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function getLastNews()
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('berita.isActive', 1);
        $this->db->order_by('berita.id_berita', 'desc');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function getKategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('isActive', 1);
        return $this->db->get()->result();
    }

    public function getAbout()
    {
        $this->db->select('about');
        $this->db->from('identitas');
        return $this->db->get()->row();
    }

    public function getMostPopular()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        // $this->db->where('berita.date', date('Y-m-d'));
        $this->db->where('berita.isActive', 1);
        $this->db->order_by('berita.viewers_days', 'desc');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function paginate($page)
    {
        return  $this->db->limit($this->perPage, $this->calculateRealOffset($page));
    }

    public function calculateRealOffset($page)
    {
        if (is_null($page) || empty($page)) {
            $offset = 0;
        } else {
            $offset = ($page * $this->perPage) - $this->perPage;
        }

        return $offset;
    }


    public function getAllPosting($page)
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('berita.isActive', 1);
        $this->paginate($page);
        $this->db->order_by('berita.id_berita', 'desc');
        return $this->db->get()->result();
    }

    public function _getIdCategory($category)
    {
        $this->db->where('slug', $category);
        return $this->db->get('kategori')->row();
    }

    public function _getIdSubCategory($category)
    {
        $this->db->where('nama_sub', $category);
        return $this->db->get('sub_kategori')->row();
    }


    public function countPosting($category = null)
    {
        if ($category) {
            $idCategory = $this->_getIdCategory($category);
            $this->db->where('kategori_id', $idCategory->id_kategori);
        }

        $this->db->where('berita.isActive', 1);
        return $this->db->count_all_results('berita');
    }

    public function countSubPosting($category = null)
    {
        if ($category) {
            $idCategory = $this->_getIdSubCategory($category);
            $this->db->where('sub_kategori_id', $idCategory->id_sub);
        }

        $this->db->where('berita.isActive', 1);
        return $this->db->count_all_results('berita');
    }

    public function getBerita($seo_title)
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('sub_kategori', 'sub_kategori.id_sub = berita.sub_kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('seo_title', $seo_title);
        return $this->db->get()->row();
    }

    public function getPostingByCategory($category, $page)
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('berita.isActive', 1);
        $this->db->where('kategori.slug', $category);
        $this->paginate($page);
        $this->db->order_by('berita.id_berita', 'desc');
        return $this->db->get()->result();
    }

    public function getPostingBySubCategory($category, $page)
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('sub_kategori', 'sub_kategori.id_sub = berita.sub_kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('berita.isActive', 1);
        $this->db->where('sub_kategori.nama_sub', $category);
        $this->paginate($page);
        $this->db->order_by('berita.id_berita', 'desc');
        return $this->db->get()->result();
    }

    

    public function search($keyword)
    {
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.kategori_id');
        $this->db->join('user', 'user.id_user = berita.user_id');
        $this->db->where('berita.isActive', 1);
        $this->db->like('title', $keyword);
        // if ($page != null) {
        //     $this->paginate($page);
        // }
        $this->db->order_by('berita.id_berita', 'desc');
        return $this->db->get();
    }

    
    public function makePagination($baseUrl, $uriSegment, $totalRows = null){
        $this->load->library('pagination');
  
        $config = [
           'base_url'            => $baseUrl,
           'uri_segment'         => $uriSegment,
           'per_page'            => $this->perPage,
           'total_rows'          => $totalRows,
           'use_page_numbers'    => true,
           
           'full_tag_open'       => '<ul class="pagination justify-content-center">',
           'full_tag_close'      => '</ul>',
           
           'attributes'          => ['class' => 'page-link text-danger'],
           'first_link'          => false,
           'last_link'           => false,
           'first_tag_open'      => '<li class="page-item">',
           'first_tag_close'     => '</li>',
           'prev_link'           => '&lt',
           'prev_tag_open'       => '<li class="page-item">',
           'prev_tag_close'      => '</li>',
           'next-link'           => '&gt',
           'next_tag_open'       => '<li class="page-item">',
           'next_tag_close'      => '</li>',
           'last_tag_open'       => '<li class="page-item">',
           'last_tag_close'      => '</li>', 
           'cur_tag_open'        => '<li class="page-item danger"><a href="#" class="page-link text-white">',
           'cur_tag_close'       => '<span class="sr-only">(current)</span></a></li>',
           'num_tag_open'        => '<li class="page-item">',
           'num_tag_close'       => '</li>'
        ];
  
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
     }
}
