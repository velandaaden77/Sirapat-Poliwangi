<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Admin_m extends CI_Model{

    

    public function cek_login($email, $password){

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('grup_rapat');

        echo $email, $password;
    }
    
    public function getLoginData($email, $pass){

        $u = $email;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('grup_rapat', array('email' => $u, 'password' =>$p));

        if(count($query_cekLogin->result()) > 0){

            foreach ($query_cekLogin->result() as $qck) {
            foreach ($query_cekLogin->result() as $ck) {
                
                $session_data['is_logged_in'] = TRUE;
                $session_data['id_karyawan'] = $ck->id_karyawan;
				// $session_data['nama_karyawan'] = $ck->nama_karyawan;
				$session_data['email'] = $ck->email;
				$session_data['id_tipe'] = $ck->id_tipe;
				$session_data['id_jabatan'] = $ck->id_jabatan;
				// $session_data['unit_karyawan'] = $ck->unit_id;
				$session_data['role_id'] = $ck->role_id;

                $this->session->set_userdata($session_data);

            }
            redirect('sirapat/admin/dashboard');
            }
        }else {
            //membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');
			//Memindahkan halaman ke halaman index
			redirect('auth/admin/index');
        }
    }
 
}