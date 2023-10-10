<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_ruang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_karu');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Kepala ruang";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/k_sidebar');
        $this->load->view('user/dashboard');
        $this->load->view('template/footer');
    }
    public function konfigurasi()
    {
        $data['title'] = "Jadwal kepala ruang";
        $data['user'] = $this->M_karu->tampil_data()->result();
        $data['shift'] = $this->M_karu->lihat_shift()->result();
        $data['perawat'] = $this->M_karu->lihat_data()->result();
        // $data['config'] = $this->M_karu->jadwal();
        $data['jadwal'] = $this->M_karu->jadwal()->result_array();
        $data['jadwals'] = $this->db->get('tb_konfigurasi')->row()->status;

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/k_sidebar');
        $this->load->view('kepala_ruang/v_config', $data);
        // $this->load->view('template/footer');
    }
    public function search()
    {
        $id = $this->input->post('idnama');
        $kode_shift = $this->input->post('idshift');

        $data = $this->M_karu->jadwal($id, $kode_shift)->result();
        echo json_encode($data);
    }
    public function update_status1($id)
    {

        $this->m_karu->update_status1($id);
        redirect('kepala_ruang/konfigurasi', 'norefresh');
    }
    public function update_status0($id)
    {
        $this->m_karu->update_status0($id);
        redirect('kepala_ruang/konfigurasi', 'norefresh');
    }
    public function update_status_tim0()
    {
        $this->m_karu->update_status_tim0();
        redirect('kepala_ruang/konfigurasi');
    }
    public function update_status_tim1()
    {
        $this->m_karu->update_status_tim1();
        redirect('kepala_ruang/konfigurasi');
    }

    // ===================ajax punya


    public function updateStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $data = $this->db->get_where('tb_konfigurasi', array('kode_konfigurasi' => $id))->row_array();
        if ($data) {
            $statusBaru = $status == '1' ? '0' : '1';
            $this->db->update('tb_konfigurasi', array('status' => $statusBaru), array('kode_konfigurasi' => $id));
            $response['response'] = true;
            $response['message'] = "Succesfully";
        } else {
            $response['success'] = false;
            $response['message'] = 'Data Tidak Ada';
        }
        echo json_encode($response);
    }

    // ===================ajax punya


    public function updateStatusAll()
    {
        $status = $this->input->post('status');

        if ($status == '1') {
            $this->db->set('status', '0');
            $this->db->update('tb_konfigurasi', NULL);
            $response['success'] = true;
            $response['message'] = 'Successfully updated to 0';
        } elseif ($status == '0') {
            $this->db->set('status', '1');
            $this->db->update('tb_konfigurasi', NULL);
            $response['success'] = true;
            $response['message'] = 'Successfully updated to 1';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed';
        }
        echo json_encode($response);
    }
}
