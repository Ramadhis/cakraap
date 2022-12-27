<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model('model_auth');
	}

	public function index()
	{
		check_status_login();
		$data['title'] = "Login Page";
		$this->load->view("auth_partial/header", $data);
		$this->load->view("auth/login");
		$this->load->view("auth_partial/footer");
	}

	public function login()
	{
		/* base_url redirect after login success */
		$redirect_to = "dashboard";

		/* disable user back to login page after success */
		if ($this->session->userdata('logged_in') == true) {
			redirect('dashboard/index');
		}

		/*  validation */
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',			[
			'min_length' => "password too short"
		]);
		/* end validation */

		if ($this->form_validation->run() == false) {
			$this->load->view("auth_partial/header");
			$this->load->view("auth/login");
			$this->load->view("auth_partial/footer");
		} else {
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$where = array(
				'email' => $email,
				// 'password' => password_hash($password, PASSWORD_DEFAULT)
			);
			$login = $this->model_auth->login_check("users", $where);

			if ($login->num_rows() > 0) {
				$get_user_data = $login->row();
				if (password_verify($password, $get_user_data->password)) {
					$data_session = array(
						'name' => $get_user_data->name,
						'email' => $get_user_data->email,
						'role' => $get_user_data->role,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($data_session);
					redirect(base_url($redirect_to));
				} else {
					redirect(base_url('auth/login'));
				}
			}
		}
	}

	public function registration()
	{
		if ($this->session->userdata('logged_in') == true) {
			redirect('dashboard/index');
		}

		/* validation */
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
		/* end validation */

		if ($this->form_validation->run() == false) {
			$this->load->view("auth_partial/header");
			$this->load->view("auth/register");
			$this->load->view("auth_partial/footer");
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post("name")),
				'email' => htmlspecialchars($this->input->post("email")),
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

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}