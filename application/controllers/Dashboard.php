<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// for check if user login
		if (check_status_login() == false) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$this->load->view('dashboard_partial/header');
		$this->load->view('dashboard_partial/sidebar');
		$this->load->view('dashboard_partial/topbar');
		$this->load->view('dashboard'); //content
		$this->load->view('dashboard_partial/modal');
		$this->load->view('dashboard_partial/footer');
	}
}