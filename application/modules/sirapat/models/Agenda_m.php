<?php

class Agenda_m extends CI_Model {

    public function get($id = null){

        // $this->db->from('agenda_rapat');
        return $this->db->get_where('agenda_rapat', ['id_user' => $this->session->userdata('id')]);
        // if($id != null){
        //     $this->db->where('id', $id);
        // }

        // $query = $this->db->get();
        // return $query;
    }

    public function update_data($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table, $data);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('agenda_rapat');
    }

    public function getAllAgenda($id){
        return $this->db->get('agenda_rapat')->result_array();
    }

    public function countAllAgenda(){
        return $this->db->get('agenda_rapat')->num_rows();
    }

    public function daftar_dosen(){
	
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('prodi', 'prodi.id = dosen.prodi');
    $query = $this->db->get();
	return $query;
    }

    public function daftar_validasi(){
	
        $this->db->select('dosen.nama,validasi_agenda.id, validasi_agenda.status,validasi_agenda.id_agenda');
        $this->db->from('validasi_agenda');
        $this->db->join('dosen', 'validasi_agenda.id_pimpinan = dosen.id ');
        $this->db->where(['id_agenda' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        }
    
    public function delval($id){
        
        $this->db->where('id', $id);
        $this->db->delete('validasi_agenda');
        
        }


}
