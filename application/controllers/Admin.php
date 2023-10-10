<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is_logged_in();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->model('M_admin');
    }

    public function index()
    {

        $data['title'] = "Admin";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }
    public function dashboard()
    {
        $data['title'] = "User";
        $data['user'] = $this->M_admin->tampil_data()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/daftar_user', $data);
        $this->load->view('template/footer');
    }
    public function hapus_user($id)
    {
        $where = array('id' => $id);
        $this->m_admin->hapus_data($where, 'user');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/dashboard');
    }

    // Data pegawai
    public function pegawai()
    {
        $data['ruangan'] = $this->m_admin->get_ruangan();
        $data['title'] = "Pegawai";
        $data['pegawai'] = $this->M_admin->lihat_data()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/data_pegawai', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'pegawai';
        $where = array('nira' => $id);
        $data['pegawai'] = $this->m_admin->edit_data($where, 'pegawai')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/edata_pegawai', $data);
        $this->load->view('template/footer');
    }
    public function update()
    {
        $id = $this->input->post('nira');
        $nira = $this->input->post('idnurs');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nira'   => $nira,
            'nama'         => $nama,
            'jabatan'      => $jabatan,
            'alamat'          => $alamat,
        );
        $where = array(
            'nira' => $id

        );
        $this->db->set('nira', $where);
        $this->m_admin->update_data($where, $data, 'pegawai');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Ubah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/pegawai');
    }
    public function hapus($id)
    {
        $where = array('nira' => $id);
        $this->m_admin->hapus_data($where, 'pegawai');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/pegawai');
    }
    // TAMBAH AKSI DATA PEGAWAI
    public function tambah_aksi()
    {

        $nira = $this->input->post('nira');
        $nama       = $this->input->post('nama');
        $jabatan    = $this->input->post('jabatan');
        $alamat        = $this->input->post('alamat');


        $this->form_validation->set_rules(
            'nira',
            'Nira',
            'required|trim|is_unique[pegawai.nira]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            )
        );

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf Anda Gagal Menambahkan Data!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
            );
            redirect('admin/pegawai');
        } else {

            $conf = array(
                'nira'   => $nira,


            );

            $data = array(
                'nira'   => $nira,
                'nama'         => $nama,
                'jabatan'      => $jabatan,
                'alamat'          => $alamat,
            );
            $this->M_admin->input_data($data, 'pegawai');
        }

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Tambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/pegawai');
    }
    // RUANGAN
    public function ruangan()
    {
        $data['title'] = "ruangan";
        $data['ruangan'] = $this->M_admin->lihat_ruangan()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/data_ruangan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_ruangan()
    {
        $nama_ruangan = $this->input->post('nama_ruangan');
        $kode = $this->input->post('kode_ruangan');

        $data = array(

            'nama_ruangan'   => $nama_ruangan,

        );
        $this->db->set('kode_ruangan', 'UUID()', false);
        $this->M_admin->input_ruangan($data, 'rawat_inap');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Tambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/ruangan');
    }

    public function hapus_ruangan($id)
    {
        $where = array('kode_ruangan' => $id);
        $this->M_admin->hapus_ruangan($where, 'rawat_inap');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/ruangan');
    }

    public function update_ruangan($id)
    {

        $nama_ruangan = $this->input->post('nama_ruangan');
        $data = array(
            'nama_ruangan'   => $nama_ruangan,
        );
        $where = array(
            'kode_ruangan' => $id
        );
        $this->M_admin->update_ruangan($where, 'rawat_inap', $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Ubah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/ruangan');
    }
    // TIM
    public function tim()
    {
        $data['title'] = "tim";
        $data['tim'] = $this->M_admin->get_tim()->result_array();
        $data['jenis'] = $this->M_admin->where_tim()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/v_tim', $data);
        $this->load->view('template/footer');
    }
    public function tambah_tim()
    {
        $id = $this->input->post('id_jenis');
        $waktu = date("Y-m-d");

        $data = array(

            'id_jenis_tim' => $id,
            'waktu' => $waktu
        );
        $this->db->set('kode_tim', 'UUID()', false);
        $this->M_admin->input_jenis('tb_tim', $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Tambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/tim');
    }
    public function hapus_tim($id)
    {
        $where = array('kode_tim' => $id);
        $this->M_admin->hapus_data($where, 'tb_tim');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/tim');
    }
    // ANGGOTA TIM
    public function anggota_tim()
    {
        $data['title'] = "Anggota tim";
        $data['tim'] = $this->M_admin->ambil_tim()->result_array();
        $data['nama'] = $this->M_admin->cari_tim()->result();
        $data['perawat'] = $this->M_admin->beri_tim()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/v_anggota_tim', $data);
        $this->load->view('template/footer');
    }
    public function tambah_anggota_tim()
    {
        $tim = $this->input->post('tim');
        $nira = $this->input->post('nira');
        $id = explode(",", $nira);

        $data = [];
        for ($i = 0; $i < count($id); $i++) {
            $data = array(
                'kd_tim' => $tim,
                'nira' => $id[$i]
            );
            $this->M_admin->input_jenis('tb_anggota_tim', $data);
        }
        // print_r(json_encode($data));
        // die;
        // 

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Tambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/anggota_tim');
    }

    public function hapus_anggota_tim($id)
    {
        $where = array('kd_tim' => $id);
        $this->M_admin->hapus_data($where, 'tb_anggota_tim');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/anggota_tim');
    }
    // JENIS TIM
    public function jenis_tim()
    {
        $data['title'] = "jenis tim";
        $data['tim'] = $this->M_admin->jenis_data()->result_array();
        // $data['jenis'] = $this->M_admin->where_data()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/v_jenis_tim', $data);
        $this->load->view('template/footer');
    }
    public function tambah_jenis()
    {
        $id = $this->input->post('id_jenis');
        $tim = $this->input->post('tim');
        $data = array(
            'id_jenis_tim' => $id,
            'tim' => $tim
        );
        $this->M_admin->input_jenis('t_jenis_tim', $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Tambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/jenis_tim');
    }
    public function hapus_jenis($id)
    {
        $where = array('id_jenis_tim' => $id);
        $this->M_admin->hapus_data($where, 't_jenis_tim');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/jenis_tim');
    }
    public function update_jenis($id)
    {
        // $id = $this->input->post('kode_ruangan');
        $tim = $this->input->post('tim');


        $data = array(
            'tim'   => $tim,

        );
        $where = array(
            'id_jenis_tim' => $id

        );
        $this->M_admin->update_jenis($where, 't_jenis_tim', $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Ubah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/jenis_tim');
    }
    // JADWAL
    public function konfigurasi()
    {
        $data['title'] = "Jadwal Operator";
        $data['user'] = $this->M_admin->tampil_data()->result();
        $data['shift'] = $this->m_admin->lihat_shift()->result();
        $data['tim'] = $this->m_admin->lihat_tim()->result();
        $data['tgl'] = $this->m_admin->lihat_waktu()->result();
        $data['perawat'] = $this->m_admin->lihat_data()->result();
        // $data['config'] = $this->m_admin->jadwal();
        $data['jadwal'] = $this->m_admin->jadwal();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/config', $data);
        // $this->load->view('template/footer');
    }
    public function search()
    {
        $id = $this->input->post('idnama');
        $kode_shift = $this->input->post('idshift');
        $data = $this->M_karu->jadwal($id, $kode_shift)->result();
        echo json_encode($data);
    }

    public function kalender()
    {
        $r['kdr'] = $this->uri->segment(3);
        $data['title'] = "KALENDER";
        $this->load->view('template/calender-header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/kalender', $r);
        $this->load->view('template/calender-footer');
    }

    public function filter_shift()
    {
        $id = $_POST['kodetim'];
        $this->m_admin->input_data(array('kode_tim' => $id), 't_temp_tim');
        $data = $this->m_admin->view_shift()->result_array();
        echo json_encode($data);

        // echo json_encode($id);
    }

    public function v_shift()
    {
        $data['kdr'] = $this->uri->segment(3);
        $data['tgl'] = $this->uri->segment(4);
        $this->m_admin->clear_tab();
        $data['title'] = "shift";
        $data['jadwal'] = $this->M_admin->view_shift()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('admin/v_shift', $data);
        $this->load->view('template/footer');
    }
    // GENERATE JADWAL
    public function set_jadwal()
    {
        $kd = $this->uri->segment(3);
        $tgl = $this->uri->segment(4);
        $waktu = explode('-', $tgl);
        $tgl = $waktu[0] . '-' . $waktu[1] . '-';
        $tgl_akhir = $this->m_admin->tgl_akhir();
        $pagi = $this->input->post('pagi');
        $siang = $this->input->post('siang');
        $malam = $this->input->post('malam');
        $lepas = $this->input->post('lepas');
        $libur = $this->input->post('libur');



        $data[1] = array(
            'kd_tim' => $pagi
        );
        $data[2] = array(
            'kd_tim' => $siang
        );
        $data[3] = array(
            'kd_tim' => $malam
        );
        $data[4] = array(
            'kd_tim' => $lepas
        );
        $data[5] = array(
            'kd_tim' => $libur
        );

        for ($j = 1; $j <= $tgl_akhir; $j++) {
            $dt[$j]['data'] = $data;

            for ($i = 1; $i <= count($dt[$j]['data']); $i++) {
                $jadwal['kode_konfigurasi'] = $this->m_admin->gatuuid()->uid;
                $jadwal['status'] = 0;
                $jadwal['tanggal'] = $tgl . $j;
                $jadwal['kode_ruangan'] = $kd;
                $jadwal['kode_shift'] = $i;
                $jadwal['kd_tim'] = $dt[$j]['data'][$i]['kd_tim'];
                if ($i <= count($dt[$j]['data']) - 1) {
                    $serlin[$i + 1] = array(
                        'kd_tim' => $jadwal['kd_tim']
                    );
                }
                $this->M_admin->tambah_jadwal($jadwal, 'tb_konfigurasi');
            }
            $serlin[1] = array(
                'kd_tim' => $jadwal['kd_tim']
            );
            $data = $serlin;
        }

        redirect('admin/kalender');
    }
    public function hapus_jadwal()
    {
        $where = array('kode_konfigurasi');
        $this->m_admin->hapus_jadwal($where, 'tb_konfigurasi');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oke Data Berhasil Di Hapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/konfigurasi');
    }
}
