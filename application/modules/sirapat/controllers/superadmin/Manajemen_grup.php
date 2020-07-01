<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_grup extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_logged_in();
        $this->load->helper('sirapat');
        $this->load->model('superadmin_m');
    }

    public function index(){


        $data['title'] = 'Manajemen Grup';
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->superadmin_m->getkaryawan()->result();
        $data['unit'] = $this->db->get('karyawan_unit')->result_array();

        $this->template->load('layout/template', 'superadmin/manajemen_grup', $data);

    }


}