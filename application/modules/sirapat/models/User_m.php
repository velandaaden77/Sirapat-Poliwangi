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

    public function getvalidasi(){

        $this->db->select ('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        // $this->db->join('karyawan_unit', 'karyawan_unit.id = agenda_rapat.id_unit');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('grup_rapat', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');
        $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_dosen')]);
        $this->db->order_by('validasi_agenda.id_agenda', 'ASC');
        $query = $this->db->get();
        return $query;

    }

    public function getallagenda(){
    
        $this->db->select('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->join('karyawan', 'validasi_agenda.id_pimpinan = karyawan.idkaryawan ');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
        $this->db->where(['validasi_agenda.status' => 1]);
        $this->db->where(['agenda_rapat.id_unit' => $this->session->userdata('unit_dosen')]);
        $this->db->limit('2');
        $this->db->order_by('agenda_rapat.id', 'DESC');
        $query = $this->db->get();
        return $query;
        }

}