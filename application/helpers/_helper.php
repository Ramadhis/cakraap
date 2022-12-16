<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function test_method()
{
  return "ini dari helpers";
}

function check_status_login()
{
  $ci = &get_instance();
  if ($ci->session->userdata('logged_in')) {
    return true;
  };
  return false;
}

function ifAdmin()
{
  return true;
}