<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data['title'] = "Login Page";
		$this->load->view("auth_partial/header", $data);
		$this->load->view("auth/login");
		$this->load->view("auth_partial/footer");
	}

	public function login()
	{
		$this->load->view("auth_partial/header");
		$this->load->view("auth/login");
		$this->load->view("auth_partial/footer");
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => "this email has already registered!"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',			[
			'min_length' => "password too short"
		]);
		$this->form_validation->set_rules(
			're_password',
			'Re_password',
			'required|trim|matches[password]',
			[
				'matches' => "password dont match! re enter password",
			]
		);

		if ($this->form_validation->run() == false) {
			$this->load->view("auth_partial/header");
			$this->load->view("auth/register");
			$this->load->view("auth_partial/footer");
		} else {
			$data = [
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
				'role' => '3',
				'is_active' => '1',
				'created_at' => date('Y-m-d'),
				'update_at' => null,
			];
			$insert = $this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<strong>Success!</strong> your account already registered, now you can login!
			</div>');
			redirect('auth/login');
		}
	}
}