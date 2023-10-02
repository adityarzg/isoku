<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getHeroSection()
    {
        $q = "SELECT `profil`.* 
                FROM `profil`
                WHERE `profil`.`pageSection` = 'section_hero' OR `profil`.`pageSection` = 'section_ecoprint' OR `profil`.`pageSection` = 'section_tempahan'
                ";
        return $this->db->query($q)->result_array();
    }

    public function getDataTitle($id)
    {
        // Query untuk mengambil data berdasarkan ID dari tabel
        $q = $this->db->get_where('profil', array('id' => $id));

        // Mengembalikan hasil query dalam bentuk objek atau array
        return $q->result_array(); //untuk mengembalikan sebagai array
    }

    public function updateTitle($id, $data)
    {
        // Query untuk memperbarui data pengguna berdasarkan ID
        $this->db->where('id', $id);
        $this->db->update('profil', $data);
    }

}
