<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Example Auth controller using Authit
 *
 * @package Authentication
 * @category Libraries
 * @author Ron Bailey
 * @version 1.0
 */

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->goToDefaultPage();
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('auth/login', $data);
		} else {
			$this->login();
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		//jika usernya ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'email' => $user['email'],
						'fullname' => $user['fullname'],
					];
					$this->session->set_userdata($data);
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User belum aktif atau tidak terdaftar!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}

	public function signup()
	{
		// $this->goToDefaultPage();
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'Username ini tidak tersedia!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini telah terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password_confirm]', [
			'matches' => 'Kata Sandi Tidak Sesuai!',
			'min_length' => 'Kata Sandi Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|trim|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Pendaftaran Pengguna Baru';
			$this->load->view('auth/signup', $data);
		} else {
			$data = [
				'fullname' => htmlspecialchars($this->input->post('fullname', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_active' => 0,
				'created_date' => date("Y-m-d h:i:sa")
			];

			//siapkan token
			$token = base64_encode(random_bytes(16));
			$user_token = [
				'email' => $this->input->post('email'),
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Selamat! Akun anda telah berhasil dibuat. Cek email anda sebelum 24 jam dari sekarang untuk melakukan aktivasi akun.</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config  = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'isoku.app@gmail.com',
			'smtp_pass' => 'isokushop',
			'smtp_port' => '465',
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('isoku.app@gmail.com', 'Isoku Developer');
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') {
			$this->email->subject('Verifikasi Pendaftaran Akun');
			$this->email->message(
				'Klik link untuk memverifikasi akun anda : 
            <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Link </a>'
			);
		} elseif ($type == 'forgot') {
			$this->email->subject('Atur Ulang Kata Sandi');
			$this->email->message(
				'Klik link untuk mengatur ulang kata sandi anda : 
            <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Link </a>'
			);
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < 86400) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah aktif! Sekarang, anda dapat login kedalam akun anda.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Link kadaluarsa.</div>');
					redirect('auth/expired');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Link tidak dikenali.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Email salah.</div>');
			redirect('auth');
		}
	}

	public function forgot()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Kata Sandi Anda?';
			$this->load->view('auth/forgot_password', $data);
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(16));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cek email anda untuk mengatur ulang kata sandi.</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email tidak terdaftar atau belum di aktivasi!</div>');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Atur ulang kata sandi gagal! Token tidak dikenali.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Atur ulang kata sandi gagal! Email salah.</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email') and $this->db->get_where('user_token', ['token' => null])) {
			redirect('auth');
		}
		$this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]|matches[repeatnew_password]');
		$this->form_validation->set_rules('repeatnew_password', 'Repeat Password', 'required|trim|min_length[6]|matches[new_password]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Kata Sandi';
			$this->load->view('auth/reset_password');
		} else {
			$password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah! Silahkan login.</div>');
			redirect('auth');
		}
	}

	public function blocked()
	{
		$data['title'] = 'Access Forbidden';
		$this->load->view('auth/blocked', $data);
	}

	public function expired()
	{
		$data['title'] = 'Expired Page';
		$this->load->view('auth/expired');
	}

	public function ilegalReset($token)
	{
		$this->db->delete('user_token', ['token' => urldecode($token)]);

		$this->session->unset_userdata('reset_email');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aksi dilarang! Email dan token pengguna tidak sesuai.</div>');
		redirect('auth');
	}
}
