<?php

class M_direktur extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('user');
    }
    function jadwal()
    {
        $query = $this->db->query("SELECT p.nira, p.nama, tj.tim, r.nama_ruangan, s.shift,(CASE
        WHEN DATE_FORMAT(k.tanggal,'%W')='Sunday' THEN 'Minggu'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Monday' THEN 'Senin'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Tuesday' THEN 'Selasa'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Wednesday' THEN 'Rabu'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Thursday' THEN 'Kamis'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Friday' THEN 'Jumat'
        WHEN DATE_FORMAT(k.tanggal,'%W')='Saturday' THEN 'Sabtu'
        END) AS hari, k.tanggal, k.kode_konfigurasi
        FROM tb_konfigurasi k 
        LEFT JOIN tb_tim t ON (k.kd_tim= t.kode_tim) 
        LEFT JOIN t_jenis_tim tj ON (t.id_jenis_tim= tj.id_jenis_tim)
        LEFT JOIN rawat_inap r on (k.kode_ruangan= r.kode_ruangan) 
        LEFT JOIN tb_shift s on (k.kode_shift= s.kode_shift)
        JOIN tb_anggota_tim ta ON (k.kd_tim= ta.kd_tim)
        LEFT JOIN pegawai p on (ta.nira= p.nira) where k.status='1' order by k.tanggal, k.kode_shift asc");
        return $query->result_array();
    }
    public function lihat_shift()
    {
        return $this->db->query('SELECT * from tb_shift order by kode_shift asc');
    }
    public function lihat_waktu()
    {
        return $this->db->query('SELECT * from tb_konfigurasi order by kode_konfigurasi asc');
    }
    public function lihat_tim()
    {
        return $this->db->query('SELECT t.*, tj.tim FROM tb_tim t LEFT JOIN t_jenis_tim tj ON(t.id_jenis_tim=tj.id_jenis_tim) order by kode_tim asc');
    }
    function lihat_data()
    {
        $query = $this->db->query("SELECT * FROM `pegawai` WHERE nira ORDER BY nira asc;");
        return $query;
    }
}
