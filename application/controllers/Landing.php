<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['heroSection'] = $this->db->get_where('profil', array('pageSection' => 'section_hero'))->row_array();
		$data['newArrival'] = $this->db->get_where('profil', array('pageSection' => 'section_newArrival'))->result_array();
		$data['gallerySection1'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'), 2, 0)->row_array();
		$data['gallerySection2'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'), 2, 1)->row_array();
		$data['gallerySection3'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'), 2, 2)->row_array();
		$data['gallerySection4'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'), 2, 3)->row_array();
		$data['titleEcoprint'] = $this->db->get_where('profil', array('pageSection' => 'section_ecoprint'))->row_array();
		$data['produkEcoprint'] = $this->db->get_where('profil', array('pageSection' => 'section_ecoprintProduct'))->result_array();
		$data['videoIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_video'))->row_array();
		$data['pelatihanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->row_array();
		$data['kursusIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->row_array();
		$data['tempahanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_tempahan'))->row_array();
		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/index', $data);
		$this->load->view('landing_pages/layouts/footer', $data);
	}

	public function shop()
	{
		$data['title'] = 'Produk';
		$data['pelatihanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->row_array();
		$data['kursusIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->row_array();
		$data['tempahanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_tempahan'))->row_array();

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/shop', $data);
		$this->load->view('landing_pages/layouts/footer', $data);
	}

	public function about()
	{
		$data['title'] = 'Tentang';
		$data['pelatihanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->row_array();
		$data['kursusIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->row_array();
		$data['tempahanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_tempahan'))->row_array();

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/about', $data);
		$this->load->view('landing_pages/layouts/footer', $data);
	}

	public function contact()
	{
		$data['title'] = 'Kontak';
		$data['pelatihanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->row_array();
		$data['kursusIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->row_array();
		$data['tempahanIsoku'] = $this->db->get_where('profil', array('pageSection' => 'section_tempahan'))->row_array();

		$this->load->view('landing_pages/layouts/header', $data);
		$this->load->view('landing_pages/layouts/navbar');
		$this->load->view('landing_pages/contact', $data);
		$this->load->view('landing_pages/layouts/footer', $data);
	}

	public function forbidden()
	{
		$this->load->view('landing_pages/e_403');
	}
}
