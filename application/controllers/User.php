<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "pegawai";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/dashboard');
        $this->load->view('template/footer');
    }
}
