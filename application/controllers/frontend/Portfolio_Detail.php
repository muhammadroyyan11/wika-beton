<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio_Detail extends CI_Controller
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
      'title' => 'Detail Portfolio',
      'detail_portfolio' => $this->db->get('portfolio')->result_array()
    ];
    $this->template->load('frontend/template', 'frontend/detail_portfolio/detail_portfolio', $data);
  }
}