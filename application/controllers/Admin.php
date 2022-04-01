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
        $data['heroSection'] = $this->admin->getHeroSection();
        $data['newArrival'] = $this->db->get_where('profil', array('pageSection' => 'section_newArrival'))->result_array();
        $data['gallerySection'] = $this->db->get_where('profil', array('pageSection' => 'section_gallery'))->result_array();
        $data['ecoprint'] = $this->db->get_where('profil', array('pageSection' => 'section_ecoprintProduct'))->result_array();
        $data['video'] = $this->db->get_where('profil', array('pageSection' => 'section_video'))->result_array();
        $data['pelatihan'] = $this->db->get_where('profil', array('pageSection' => 'section_pelatihan'))->result_array();
        $data['kursus'] = $this->db->get_where('profil', array('pageSection' => 'section_kursus'))->result_array();
        $this->load->view('dist/index', $data);
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
}
