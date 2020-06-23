<?php

class Pimpinan_m extends CI_Model {

    public function get($id = null){
        // $this->db->from('validasi_agenda');
        // $this->db->where('id', $id);
        return $this->db->get_where('validasi_agenda', $id);
    }

    public function getvalidasi(){

        $this->db->select('*');
        
            // 'agenda_rapat.nama_agenda,
            // agenda_rapat.id,
            // agenda_rapat.tanggal,
            // agenda_rapat.tempat,
            // validasi_agenda.id, 
           
            // validasi_agenda.status,
            // validasi_agenda.id_agenda');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_dosen')]);
        $query = $this->db->get();
        return $query;

    }

    public function getagenda(){
    
    $this->db->select('*');
    $this->db->from('agenda_rapat');
    $this->db->join('jenis_rapat', 'agenda_rapat.idjenis_rapat = jenis_rapat.id ');
    $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_dosen')]);
    $query = $this->db->get();
    return $query;
    }
    
    public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}