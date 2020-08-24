<?php

class Grup_m extends CI_Model {

    public function joingrup(){

        $this->db->select ('*');
        $this->db->from('grup_rapat');
        $this->db->join('grup_tipe', 'grup_rapat.id_tipe = grup_tipe.id ');
        $this->db->join('karyawan', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');
        $this->db->join('karyawan_unit', 'karyawan_unit.id = karyawan.unit_id ');
        $this->db->join('grup_jabatan', 'grup_rapat.id_jabatan = grup_jabatan.idjabatan ');
        $this->db->where(['grup_rapat.id_tipe' => $this->session->userdata('idgrup')]);
        $query = $this->db->get();
        return $query;
    }

    public function getkaryawan(){

        $this->db->select ('*');
        $this->db->from('karyawan');
        
        $query = $this->db->get();
        return $query;

    }

    public function gr_rapat($id_karyawan,$id_tipe){

        $this->db->select ('*');
        $this->db->from('grup_rapat');
        $this->db->where('id_karyawan',$id_karyawan);
        $this->db->where('id_tipe',$id_tipe);
        $query = $this->db->get();
        return $query;

    }

}