<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function test_method()
{
  return "ini dari helpers";
}

function check_status_login()
{
  $ci = &get_instance();
  if (!$ci->session->userdata('logged_in')) {
    redirect('auth/login');
    return false;
  }elseif($ci->session->userdata('logged_in')){
    return true;
  }else{
    return false;
  };
}

function template_dashboard($view_name)
{
  $ci = &get_instance();
  $ci->load->view('dashboard_partial/header');
  $ci->load->view('dashboard_partial/sidebar');
  $ci->load->view('dashboard_partial/topbar');
  $ci->load->view($view_name); //content
  $ci->load->view('dashboard_partial/modal');
  $ci->load->view('dashboard_partial/footer');
}

function ifAdmin()
{
  $ci = &get_instance();
  if ($ci->session->userdata('role') == 1) {
    return true;
  }
  return false;
}