<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('dashboard_partial/header');
		$this->load->view('dashboard_partial/sidebar');
		$this->load->view('dashboard_partial/topbar');
		$this->load->view('dashboard'); //content
		$this->load->view('dashboard_partial/footer');
	}

	public function tes()
	{
		echo "ini function tes";
	}
}