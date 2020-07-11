<?php

class User_m extends CI_Model {

    public function getgruprapat(){

    $this->db->select('*');
    $this->db->from('grup_rapat');
    $this->db->join('karyawan', 'karyawan.idkaryawan = grup_rapat.id_karyawan');
    $this->db->join('grup_tipe', 'grup_tipe.id = grup_rapat.id_tipe');
    $this->db->join('grup_jabatan', 'grup_jabatan.idjabatan = grup_rapat.id_jabatan ');
    $this->db->where(['karyawan.idkaryawan' => $this->session->userdata('id_karyawan')]);
    $query = $this->db->get();
    return $query;

    }

}