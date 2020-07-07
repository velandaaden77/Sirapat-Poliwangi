<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Pimpinan_m extends CI_Model{

    public function login($post){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $post['email']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;

    }

    public function cek_login($email, $password){

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('karyawan');

        echo $email, $password;
    }
    
    public function getLoginData($email, $pass){

        $u = $email;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('karyawan', array('email' => $u, 'password' =>$p));

        if(count($query_cekLogin->result()) > 0){

            foreach ($query_cekLogin->result() as $qck) {
            foreach ($query_cekLogin->result() as $ck) {
                $session_data['logged_in'] = TRUE;
                $session_data['id_dosen'] = $ck->idkaryawan;
                $session_data['nama_dosen'] = $ck->nama_karyawan;
                $session_data['email_dosen'] = $ck->email;
                $session_data['unit_dosen'] = $ck->unit_id;
                $session_data['password'] = $ck->password;
                $session_data['role_id_dosen'] = $ck->role_id;

                $this->session->set_userdata($session_data);

            }
            redirect('sirapat/pimpinan/dashboard');
            }
        }else {
            //membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/pimpinan/index');
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