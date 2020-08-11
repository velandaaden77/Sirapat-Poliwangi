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
    
        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup, validasi_agenda.*, karyawan.*');
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

    public function laporan(){
    
        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup, validasi_agenda.*, karyawan.*');
        $this->db->from('agenda_rapat');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup ');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan ');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(6)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function daftarhadir(){
    
        $this->db->select ('*');
        $this->db->from('absensi');
        $this->db->join('karyawan', 'karyawan.idkaryawan = absensi.id_karyawan');
        $this->db->where(['absensi.id_agenda' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function notulen(){
    
        $this->db->select('*');
        $this->db->from('notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->join('grup_tipe', 'grup_tipe.id = agenda_rapat.id_tipegrup');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function risalahrapat(){
    
        $this->db->select('*');
        $this->db->from('risalah_rapat');
        $this->db->join('notulen', 'notulen.idnotulen = risalah_rapat.id_notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function psbw(){
    
        $this->db->select('*');
        $this->db->from('permasalahan');
        $this->db->join('notulen', 'notulen.idnotulen = permasalahan.id_notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function beritaacara(){
    
        $this->db->select('*');
        $this->db->from('berita_acara');
        $this->db->join('notulen', 'notulen.idnotulen = berita_acara.id_notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function filterdata($bulan){
    
        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup, validasi_agenda.*, karyawan.*');
        $this->db->from('agenda_rapat');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup ');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan ');

        $this->db->where(['agenda_rapat.id_tipegrup' => $this->uri->segment(5)]);
        $this->db->where(['agenda_rapat.status_agenda' => 1]);
        $this->db->like(['agenda_rapat.date_created' => $bulan]);
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

}