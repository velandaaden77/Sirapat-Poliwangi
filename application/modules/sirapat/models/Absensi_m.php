<?php

class Absensi_m extends CI_Model {


    public function getanggota(){

        $this->db->select ('agenda_rapat.*, grup_rapat.*, karyawan.*');
        $this->db->from('agenda_rapat');
        // $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('grup_rapat', 'agenda_rapat.id_tipegrup = grup_rapat.id_tipe ');
        // $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
        $this->db->join('karyawan', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;

     

}

}