<?php
// Penduduk.php
class M_unggah_agenda extends CI_Model {
	public function __construct()
	{
		$this->load->database('sirapat');
	}
 
	public function tampil_data()
	{
		return $this->db->get('agenda_rapat');
    }
    
    public function input_data($data,$table){
        // $this->db->insert('agenda_rapat', $data);
         $this->db->insert($table, $data);
    }
 
	public function hapus_data($id){

		$this->db->where('id', $id);
		$this->db->delete('agenda_rapat');


		// $this->db->where($where);
		// $this->db->delete($table);
	}
  
	public function edit_data(){

		// return $this->db->get_where($table, $where);

	$this->db->select('*');
    $this->db->from('agenda_rapat');
    $this->db->join('grup_rapat', 'agenda_rapat.id_tipegrup = grup_rapat.id_grup ');
    $this->db->join('grup_tipe', 'grup_tipe.id = grup_rapat.id_tipe ');
    $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
    $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function detail_data($id = NULL){
		$query = $this->db->get_where('agenda_rapat')->row();
		return $query;
	}

	public function getjenisrapat(){

        // $query ="SELECT `user_sub_menu`.*, `user_menu`.`menu`
        //         FROM `user_sub_menu` JOIN `user_menu`
        //         ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        //         ";
        $query ="SELECT `agenda_rapat`.*, `jenis_rapat`.`jenis_rapat`
                FROM `agenda_rapat` JOIN `jenis_rapat`
                ON `agenda_rapat`.`idjenis_rapat` = `jenis_rapat`.`id`
                ";

        return $this->db->query($query)->result_array();
	}
	
	public function getdosen(){
		return $this->db->get('dosen');
	}
}