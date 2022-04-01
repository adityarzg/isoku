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
        // var_dump($query);
        // exit;
    }
}
