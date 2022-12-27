<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// for check if user login
		check_status_login();
	}

	public function index()
	{
		//template setting in helpers/_helpers
		template_dashboard('dashboard');
	}
}