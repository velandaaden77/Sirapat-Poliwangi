<?php 

function is_loginn(){    

    $ci = get_instance(); //pemanggilanlibrary CI

    //Apabila tidak ada session
    if (!$ci->session->userdata('email_karyawan')){

        //Redirect ke halaman login
        redirect('auth/user/index');

    //jika session ada
    }else{
        
        //cek role id disession
        $role_id = $ci->session->userdata('role_id_karyawan');
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

        if($userAccess->num_rows() < 1){

            redirect('auth/blocked');
        }
    }

}



