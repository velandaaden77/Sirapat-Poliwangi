<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Grup_m extends CI_Model{


    public function cek_login($nama_grup, $password){

        $this->db->where('nama_grup', $nama_grup);
        $this->db->where('password', $password);
        return $this->db->get('grup_tipe');

        echo $nama_grup, $password;
    }
    
    public function getLoginData($nama_grup, $pass){

        $u = $nama_grup;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('grup_tipe', array('nama_grup' => $u, 'password' =>$p));

        if(count($query_cekLogin->result()) > 0){

            foreach ($query_cekLogin->result() as $qck) {
            foreach ($query_cekLogin->result() as $ck) {
                $session_data['login'] = TRUE;
                $session_data['idgrup'] = $ck->id;
                $session_data['nama_grup'] = $ck->nama_grup;
                $session_data['role_id_grup'] = $ck->role_id;

                $this->session->set_userdata($session_data);

            }
            redirect('sirapat/grup/dashboard');
            }
        }else {
            //membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/grup/index');
        }
    }

    public function check_account($email)
    {
        //cari email lalu lakukan validasi
        $this->db->where('email', $email);
        $query = $this->db->get('user')->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->is_actived == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    // Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        // $this->db->from('konfigurasi');
        $query = $this->db->get();
        return $query->row_array();
    }

 
}