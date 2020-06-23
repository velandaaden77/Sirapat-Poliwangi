<?php 

Class Fungsi {
protected $ci;

function cek_already_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('email');
    if($user_session){
        redirect('Dashboard');
    }
}

function cek_not_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('email');
    if(!$user_session){
        redirect('auth/index');
    }
}

public function count_agenda(){

    $this->ci &= get_instance(); 

    $this->ci->load->model('agenda_m');
    return $this->ci->agenda_m->get()->num_rows();
}

}