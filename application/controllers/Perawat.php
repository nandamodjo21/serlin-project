<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_perawat');
    }

    public function index()
    {

        $data['title'] = "Jadwal Perawat";

        $nira = $this->session->userdata();
        if ($nira == '') {
            $nira = null;
        }
        $data['perawat'] = $this->M_perawat->get_data()->result();
        $data['jadwal'] = $this->M_perawat->get_jadwal()->result();
        $this->load->view('template/header', $data);
        $this->load->view('perawat/v_search', $data);
    }

    public function search()
    {
        $id = $this->input->post('idnurse');
        // print_r($id);
        // die;
        $data = $this->M_perawat->get_jadwal($id)->result();
        echo json_encode($data);
    }
}
