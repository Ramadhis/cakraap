<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // for check if user login
    check_status_login();
  }
  public function index()
  {
    $data['title'] = "User Management";
    $data['sub_title'] = "List User";
    $this->load->view('dashboard_partial/header');
    $this->load->view('dashboard_partial/sidebar');
    $this->load->view('dashboard_partial/topbar');
    $this->load->view('usermanagement', $data); //content
    $this->load->view('dashboard_partial/modal');
    $this->load->view('dashboard_partial/footer');
  }

  public function tes()
  {
    echo "ini function tes";
  }
}