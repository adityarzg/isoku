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
        $data['newArrival'] = $this->admin->getNewArrival();
        $data['gallerySection'] = $this->admin->getGallerySection();
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
