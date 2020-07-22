<?php 



function is_logged_in(){    

    $ci = get_instance(); //pemanggilanlibrary CI

    //Apabila tidak ada session
    if (!$ci->session->userdata('email')){

        //Redirect ke halaman login
        redirect('Login-User');

    //jika session ada
    }else {
        
        //cek role id disession
        $role_id = $ci->session->userdata('role_id');
        //ambil data uri segmen ke dua di browser
        $menu = $ci->uri->segment(2);
        //query menu ke tabel user_menu
        $querymenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        //mengambil id menu dari tabel user_menu
        $menu_id = $querymenu['id'];
        //mengambil data roleid sama menu id di tabel user_access_menu
        $userAccess = $ci->db->get_where('user_access_menu', 
        [
        'role_id' => $role_id, 
        'menu_id' => $menu_id
        ]);

        // if($userAccess->num_rows() < 1){

        //     redirect('auth/blocked');
        // }
    }
}

function check_access($role_id, $menu_id){
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);

    $result = $ci->db->get('user_access_menu');

    if($result->num_rows() > 0 ){
        return "checked='checked'";
    }

}

function checkabsen($id, $idkaryawan){
    $ci = get_instance();

    $ci->db->where('id_agenda', $id);
    $ci->db->where('id_karyawan', $idkaryawan);

    $result = $ci->db->get('absensi');

    if($result->num_rows() > 0 ){
        return "checked ='checked', disabled";
    }

}

