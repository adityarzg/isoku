<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Beranda';

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/index', $data);
		$this->load->view('landing_pages/layouts/footer');
	}

	public function shop()
	{
		$data['title'] = 'Produk';

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/shop', $data);
		$this->load->view('landing_pages/layouts/footer');
	}

	public function about()
	{
		$data['title'] = 'Tentang';

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/about', $data);
		$this->load->view('landing_pages/layouts/footer');
	}

	public function contact()
	{
		$data['title'] = 'Kontak';

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/contact', $data);
		$this->load->view('landing_pages/layouts/footer');
	}
}
