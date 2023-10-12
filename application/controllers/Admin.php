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
        $data['edit_profil'] = $this->admin->getDataProfil($id);
        $this->load->view('dist/form/profil', $data);
    }

    public function processTitle() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
		$this->form_validation->set_rules('content', 'Isi Konten', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Title Landing Page';
			$this->load->view('dist/form/profil', $data);
		} else 
			$id = $this->secure->decrypt_url($this->input->post('id'));
            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

			$this->admin->updateLanding($id, $data);
            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
            $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            $message .= '<span aria-hidden="true">&times;</span>';
            $message .= '</button>';
            $message .= '</div>';
			$this->session->set_flashdata('message', $message);
			redirect('Admin/landing');
		
    }

    public function processGaleri() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        
        //get info file image
        $check_file = $_FILES['image'];

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Konten Pelatihan';
			$this->load->view('dist/form/profil', $data);
		} else {
            if (!empty($check_file['name'])) {
                // Define the upload configuration
                $config['upload_path']   = 'assets/img/gallery/'; // The path to your upload directory
                $config['allowed_types'] = 'jpg|jpeg|png'; // The allowed file types
                $config['max_size']      = 2048; // Maximum file size in kilobytes (2MB)

                // Load the upload library with the configuration
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // File uploaded successfully, get the file data
                    $upload_data = $this->upload->data();

                    // Now, you can access the file information using $upload_data
                    $file_name = $upload_data['file_name'];

                    // Do something with the uploaded file, e.g., save the filename to the database
                    $id = $this->secure->decrypt_url($this->input->post('id'));
                    $data = array(
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'image' => $file_name
                    );
                    $this->admin->updateLanding($id, $data);
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing');
                } else {
                    $error = $this->upload->display_errors();
                    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    $message .= $error;
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing'); // You can handle the error as needed, e.g., show a flash message
                }
            } else {
                $id = $this->secure->decrypt_url($this->input->post('id'));
                $data = array(
                    'title' => $this->input->post('title')
                );
                $this->admin->updateLanding($id, $data);
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
    }

    public function processPelatihan() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Konten', 'required|trim');
        
        //get info file image
        $check_file = $_FILES['image'];

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Konten Pelatihan';
			$this->load->view('dist/form/profil', $data);
		} else {
            if (!empty($check_file['name'])) {
                // Define the upload configuration
                $config['upload_path']   = 'assets/img/gallery/'; // The path to your upload directory
                $config['allowed_types'] = 'jpg|jpeg|png'; // The allowed file types
                $config['max_size']      = 2048; // Maximum file size in kilobytes (2MB)

                // Load the upload library with the configuration
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // File uploaded successfully, get the file data
                    $upload_data = $this->upload->data();

                    // Now, you can access the file information using $upload_data
                    $file_name = $upload_data['file_name'];

                    // Do something with the uploaded file, e.g., save the filename to the database
                    $id = $this->secure->decrypt_url($this->input->post('id'));
                    $data = array(
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'image' => $file_name
                    );
                    $this->admin->updateLanding($id, $data);
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing');
                } else {
                    $error = $this->upload->display_errors();
                    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    $message .= $error;
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing'); // You can handle the error as needed, e.g., show a flash message
                }
            } else {
                $id = $this->secure->decrypt_url($this->input->post('id'));
                $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                );
                $this->admin->updateLanding($id, $data);
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
    }

    public function processKursus() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Konten', 'required|trim');
        
        //get info file image
        $check_file = $_FILES['image'];

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Konten Kursus';
			$this->load->view('dist/form/profil', $data);
		} else {
            if (!empty($check_file['name'])) {
                // Define the upload configuration
                $config['upload_path']   = 'assets/img/gallery/'; // The path to your upload directory
                $config['allowed_types'] = 'jpg|jpeg|png'; // The allowed file types
                $config['max_size']      = 2048; // Maximum file size in kilobytes (2MB)

                // Load the upload library with the configuration
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // File uploaded successfully, get the file data
                    $upload_data = $this->upload->data();

                    // Now, you can access the file information using $upload_data
                    $file_name = $upload_data['file_name'];

                    // Do something with the uploaded file, e.g., save the filename to the database
                    $id = $this->secure->decrypt_url($this->input->post('id'));
                    $data = array(
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'image' => $file_name
                    );
                    $this->admin->updateLanding($id, $data);
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing');
                } else {
                    $error = $this->upload->display_errors();
                    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    $message .= $error;
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing'); // You can handle the error as needed, e.g., show a flash message
                }
            } else {
                $id = $this->secure->decrypt_url($this->input->post('id'));
                $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                );
                $this->admin->updateLanding($id, $data);
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
    }
    
    public function processUrlVideo() 
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('link', 'Url Video', 'required|trim');
        
        //get info file image
        $check_file = $_FILES['image'];

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Url Video';
			$this->load->view('dist/form/profil', $data);
		} else {
            if (!empty($check_file['name'])) {
                // Define the upload configuration
                $config['upload_path']   = 'assets/img/gallery/'; // The path to your upload directory
                $config['allowed_types'] = 'jpg|jpeg|png'; // The allowed file types
                $config['max_size']      = 2048; // Maximum file size in kilobytes (2MB)

                // Load the upload library with the configuration
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // File uploaded successfully, get the file data
                    $upload_data = $this->upload->data();

                    // Now, you can access the file information using $upload_data
                    $file_name = $upload_data['file_name'];

                    // Do something with the uploaded file, e.g., save the filename to the database
                    $id = $this->secure->decrypt_url($this->input->post('id'));
                    $data = array(
                        'title' => $this->input->post('title'),
                        'link' => $this->input->post('link'),
                        'image' => $file_name
                    );
                    $this->admin->updateLanding($id, $data);
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    $message .= 'Data Judul dan Konten Beranda telah berhasil diubah!';
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing');
                } else {
                    $error = $this->upload->display_errors();
                    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    $message .= $error;
                    $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    $message .= '<span aria-hidden="true">&times;</span>';
                    $message .= '</button>';
                    $message .= '</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('Admin/landing'); // You can handle the error as needed, e.g., show a flash message
                }
            } else {
                $id = $this->secure->decrypt_url($this->input->post('id'));
                $data = array(
                    'title' => $this->input->post('title'),
                    'link' => $this->input->post('link')
                );
                $this->admin->updateLanding($id, $data);
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
    }
}
