<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User_m extends CI_Model{

    

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
                
                $session_data['is_loginn'] = TRUE;
                $session_data['id_karyawan'] = $ck->idkaryawan;
				$session_data['nama_karyawan'] = $ck->nama_karyawan;
				$session_data['email_karyawan'] = $ck->email;
				$session_data['unit_karyawan'] = $ck->unit_id;
				$session_data['role_id_karyawan'] = $ck->role_id;

                $this->session->set_userdata($session_data);

            }
            redirect('sirapat/user/dashboard');
            }
        }else {
            //membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');
			//Memindahkan halaman ke halaman index
			redirect('auth/user/index');
        }
    }
 
}