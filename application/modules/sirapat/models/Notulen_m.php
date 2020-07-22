<?php

class Notulen_m extends CI_Model {

    public function input_data($data,$table){
        // $this->db->insert('agenda_rapat', $data);
         $this->db->insert($table, $data);
    }
    
    public function getdata($id = null){

        return $this->db->get_where('agenda_rapat', ['id_user' => $this->session->userdata('id')]);
    }

    public function getagenda(){

    $this->db->where(['id_user' => $this->session->userdata('iduser')]);
    $this->db->where(['status_agenda' => 1]);
    $this->db->order_by('id', 'DESC');
    return $this->db->get('agenda_rapat');

    }

    public function detail_data($where,$table){
		return $this->db->get_where($table, $where);
    }
    
    public function getnotulen(){

        return $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->result();
    
    }

    public function ketuarapat($id){
        $this->db->select('*');
        $this->db->from('agenda_rapat');
        $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup');
        $this->db->join('karyawan', 'karyawan.idkaryawan = grup_rapat.id_karyawan');

        $this->db->where(['agenda_rapat.id' => $id]);
        $this->db->where(['grup_rapat.id_jabatan' => 1]);
        $query = $this->db->get();
        return $query;
    }

    public function getrisalah(){

    $this->db->select('*');
    $this->db->from('risalah_rapat');
    $this->db->join('notulen', 'risalah_rapat.id_notulen = notulen.idnotulen');
    $this->db->where(['risalah_rapat.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function getpbsw(){

    $this->db->select('*');
    $this->db->from('permasalahan');
    $this->db->join('notulen', 'permasalahan.id_notulen = notulen.idnotulen');
    $this->db->where(['permasalahan.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function delrisalah($id){
        $this->db->where('id_risalahrapat', $id);
        $this->db->delete('risalah_rapat');
    }

    public function notulensi(){

        $this->db->select('*');
        $this->db->from('notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->join('grup_tipe', 'grup_tipe.id = agenda_rapat.id_tipegrup');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = grup_tipe.id');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }
}