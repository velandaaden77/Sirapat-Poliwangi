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

    $this->db->select('*');
    $this->db->from('agenda_rapat');
    $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
    $this->db->where(['validasi_agenda.id_user' => $this->session->userdata('id')], 
    ['validasi_agenda.status' => 1]);
    $query = $this->db->get();
    return $query;

    }
}