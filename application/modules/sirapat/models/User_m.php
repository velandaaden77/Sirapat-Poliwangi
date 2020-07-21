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
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('grup_rapat', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');

        $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_karyawan')]);
        $this->db->where(['validasi_agenda.id_grup' => $this->uri->segment(5)]);
        $this->db->where(['grup_rapat.id_tipe' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;

    }

    public function notifval(){

        $this->db->select ('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('grup_rapat', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');

        $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_karyawan')]);
        $this->db->where(['validasi_agenda.id_grup' => $this->uri->segment(5)]);
        $this->db->where(['grup_rapat.id_tipe' => $this->uri->segment(5)]);
        $this->db->limit('2');
        $this->db->order_by('validasi_agenda.id_validasi', 'DESC');
        $query = $this->db->get();
        return $query;

    }

    public function notif($idtipe){

        $this->db->select ('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('grup_rapat', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');

        // $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_karyawan')]);
        // $this->db->where(['validasi_agenda.id_grup' => $this->uri->segment(5)]);
        // $this->db->where(['grup_rapat.id_tipe' => $this->uri->segment(5)]);
        $this->db->where('validasi_agenda.status' == 1);
        $query = $this->db->get();
        return $query;

    }

    public function getallagenda(){
    
        $this->db->select ('*');
        $this->db->from('agenda_rapat');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup ');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan ');
        $this->db->where(['agenda_rapat.id_tipegrup' => $this->uri->segment(5)]);
        $this->db->where(['agenda_rapat.status_agenda' => 1]);
        $query = $this->db->get();
        return $query;
        
        }

    public function filterdata($bulan){
    
        $this->db->select ('*');
        $this->db->from('agenda_rapat');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup ');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan ');

        $this->db->where(['agenda_rapat.id_tipegrup' => $this->uri->segment(5)]);
        $this->db->where(['agenda_rapat.status_agenda' => 1]);
        $this->db->like(['agenda_rapat.tanggal' => $bulan]);
        $query = $this->db->get();
        return $query;
        
        }

        public function checkaccess($idgrup){

                $this->db->select('*');
                $this->db->from('grup_rapat');
                $this->db->join('karyawan', 'karyawan.idkaryawan = grup_rapat.id_karyawan');
                // $this->db->join('grup_tipe', 'grup_tipe.id = grup_rapat.id_tipe');
                $this->db->join('grup_jabatan', 'grup_jabatan.idjabatan = grup_rapat.id_jabatan ');
                $this->db->where(['karyawan.idkaryawan' => $this->session->userdata('id_karyawan')]);
                $this->db->where(['grup_rapat.id_tipe' => $idgrup]);
                $query = $this->db->get();
                return $query;
        }

        public function detailagenda(){

            $this->db->select ('*');
            $this->db->from('validasi_agenda');
            $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
            $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
            $this->db->where(['validasi_agenda.id_validasi' => $this->uri->segment(5)]);
            $query = $this->db->get();
            return $query;
    
        }

}