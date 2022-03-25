<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getHeroSection()
    {
        $q = "SELECT `profil`.* 
                FROM `profil`
                WHERE`profil`.`pageSection` = 'section_hero'
                ";
        return $this->db->query($q)->result_array();
        // var_dump($query);
        // exit;
    }

    public function getNewArrival()
    {
        $q = "SELECT `profil`.* 
                FROM `profil`
                WHERE`profil`.`pageSection` = 'section_newArrival'
                ";
        return $this->db->query($q)->result_array();
        // var_dump($query);
        // exit;
    }

    public function getGallerySection()
    {
        $q = "SELECT `profil`.* 
                FROM `profil`
                WHERE`profil`.`pageSection` = 'section_gallery'
                ";
        return $this->db->query($q)->result_array();
        // var_dump($query);
        // exit;
    }
}
