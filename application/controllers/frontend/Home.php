<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
    }

    public function index()
    {
        $data = [
          'title'       => 'Home Page',
          'kategori'    => $this->db->get('kategori')->result_array()  
        ];
        $this->template->load('frontend/template', 'frontend/home/home', $data);
    }
}
