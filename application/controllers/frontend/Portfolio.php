<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
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
          'title'       => 'Portfolio',
          'portfolio'    => $this->db->get('portfolio')->result_array()  
        ];
        $this->template->load('frontend/template', 'frontend/portfolio/portfolio', $data);
    }
}
