<?php

class Superadmin_m extends CI_Model {

    public function getkaryawan(){

        $this->db->select ('*');
        $this->db->from('karyawan');
        $this->db->join('karyawan_unit', 'karyawan.unit_id = karyawan_unit.id ');
        $query = $this->db->get();
        return $query;

    }

}