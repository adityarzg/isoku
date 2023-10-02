<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('dist/index', $data);
    }

    public function landing()
    {
        $data['title'] = 'Landing Homepage';
        $data['heroSection'] = $this->admin->getHeroSection();
        $data['newArrival'] = $this->db->get_where('profil', array('pageSection' => 'section_newArrival'))->result_array();
        $data['gallerySection'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'))->result_array();
        $data['ecoprint'] = $this->db->get_where('profil', array('pageSection' => 'section_ecoprintProduct'))->result_array();
        $data['video'] = $this->db->get_where('profil', array('pageSection' => 'section_video'))->result_array();
        $data['pelatihan'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->result_array();
        $data['kursus'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->result_array();
        $this->load->view('dist/landing', $data);
    }

    public function produk()
    {
        $data['title'] = 'Produk';
        $this->load->view('dist/produk', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang';
        $this->load->view('dist/tentang', $data);
    }

    public function kontak()
    {
        $data['title'] = 'Kontak';
        $this->load->view('dist/kontak', $data);
    }

    public function form($type, $value)
    {   
        $id = $this->secure->decrypt_url(urldecode($value));
        $data['title'] = 'Form Profil';
        $data['type'] = $type;
        $data['edit_title'] = $this->admin->getDataTitle($id);
        // print_r($data['edit_title']);die();
        $this->load->view('dist/form/profil', $data);
    }

    public function processTitle() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
		$this->form_validation->set_rules('content', 'Isi Konten', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Kata Sandi';
			$this->load->view('dist/form/profil', $data);
		} else 
			$id = $this->secure->decrypt_url($this->input->post('id'));
            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

			$this->admin->updateTitle($id, $data);
            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
            $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            $message .= '<span aria-hidden="true">&times;</span>';
            $message .= '</button>';
            $message .= '</div>';
			$this->session->set_flashdata('message', $message);
			redirect('Admin/landing');
		
    }
}
