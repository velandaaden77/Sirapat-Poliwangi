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

    public function getabsensi(){

        $this->db->select ('*');
        $this->db->from('absensi');
        $this->db->join('agenda_rapat', 'absensi.id_agenda = agenda_rapat.id');
        $this->db->join('karyawan', 'absensi.id_karyawan = karyawan.idkaryawan ');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;

}
    public function getabsen(){

        $this->db->select ('*');
        $this->db->from('grup_rapat');
        $this->db->join('agenda_rapat', 'agenda_rapat.id_tipegrup = grup_rapat.id_tipe');
        $this->db->join('absensi', 'absensi.id_agenda = agenda_rapat.id');
        $this->db->join('karyawan', 'absensi.id_karyawan = karyawan.idkaryawan ');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;

}

public function getagenda(){

    $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup');
    $this->db->from('agenda_rapat');
    $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
    // $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
    $this->db->where(['agenda_rapat.id_user' => $this->session->userdata('iduser')] );
    $this->db->where(['agenda_rapat.status_agenda' => 1] );
    $this->db->order_by('agenda_rapat.id', 'DESC');
    $query = $this->db->get();
    return $query;

}

}