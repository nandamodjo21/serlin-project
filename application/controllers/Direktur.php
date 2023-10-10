<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_direktur');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Direktur";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/d_sidebar');
        $this->load->view('user/d_dashboard');
        $this->load->view('template/footer');
    }
    public function konfigurasi()
    {
        $data['title'] = "Jadwal direktur";
        $data['user'] = $this->M_direktur->tampil_data()->result();
        $data['shift'] = $this->M_direktur->lihat_shift()->result();
        $data['tim'] = $this->M_direktur->lihat_tim()->result();
        $data['tgl'] = $this->M_direktur->lihat_waktu()->result();
        $data['perawat'] = $this->M_direktur->lihat_data()->result();
        // $data['config'] = $this->M_direktur->jadwal();
        $data['jadwal'] = $this->M_direktur->jadwal();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/d_sidebar');
        $this->load->view('direktur/vk_config', $data);
        // $this->load->view('template/footer');
    }
}
