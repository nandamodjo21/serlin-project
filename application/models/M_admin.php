<?php

class M_admin extends CI_Model
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
        LEFT JOIN pegawai p on (ta.nira= p.nira) order by k.tanggal, k.kode_shift asc");
        return $query->result_array();
    }
    function lihat_data()
    {
        $query = $this->db->query("SELECT * FROM `pegawai` WHERE nira ORDER BY nira asc;");
        return $query;
    }
    public function view_shift()
    {

        $query = $this->db->query("SELECT t.kode_tim, jt.tim FROM tb_tim t LEFT JOIN t_jenis_tim jt ON(t.id_jenis_tim=jt.id_jenis_tim) where t.kode_tim not in (select kode_tim from t_temp_tim) order by t.id_jenis_tim");
        return $query;
    }
    public function clear_tab()
    {
        $this->db->query("DELETE FROM `t_temp_tim` WHERE 1");
    }
    public function gatuuid()
    {
        return $this->db->query("select uuid() as uid")->row();
    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function tambah_jadwal($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function tgl_akhir()
    {
        return $this->db->query("SELECT day( LAST_DAY(concat(YEAR(now()),'-',month(now()) + 1,'-01')) )AS tglakhir")->row()->tglakhir;
    }
    public function lihat_shift()
    {
        return $this->db->query('SELECT * from tb_shift order by kode_shift asc');
    }
    public function lihat_waktu()
    {
        return $this->db->query('SELECT DATE(tanggal) AS tgl FROM tb_konfigurasi GROUP BY tanggal');
    }
    public function lihat_tim()
    {
        return $this->db->query('SELECT t.*, tj.tim FROM tb_tim t LEFT JOIN t_jenis_tim tj ON(t.id_jenis_tim=tj.id_jenis_tim) order by kode_tim asc');
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function hapus_jadwal($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data, $where);
    }
    public function get_ruangan()
    {
        return $this->db->get('rawat_inap')->result();
    }
    public function input_nama($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // RUANGAN
    function lihat_ruangan()
    {
        $query = $this->db->get('rawat_inap');
        return $query;
    }
    public function input_ruangan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_ruangan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_ruangan($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_ruangan($where, $table, $data)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // TIM
    function get_tim()
    {
        $query = $this->db->query('SELECT j.tim, t.* FROM `tb_tim` t JOIN t_jenis_tim j ON(t.id_jenis_tim=j.id_jenis_tim) order by j.id_jenis_tim asc');
        return $query;
    }
    function where_tim()
    {
        // return $this->db->get('t_jenis_tim');
        return $this->db->query('SELECT * FROM `t_jenis_tim` WHERE id_jenis_tim NOT IN(SELECT id_jenis_tim FROM tb_tim WHERE id_jenis_tim)');
    }

    function ambil_tim()
    {
        $query = $this->db->query("SELECT a.kode_tim,a.id_jenis_tim,c.tim, b.nama FROM `tb_anggota_tim` t JOIN tb_tim a ON(t.kd_tim=a.kode_tim) JOIN pegawai b ON(t.nira=b.nira) left join t_jenis_tim c on (c.id_jenis_tim=a.id_jenis_tim) order by a.id_jenis_tim asc");
        return $query;
    }

    public function cari_tim()
    {
        $query = $this->db->query('SELECT a.*, b.kd_tim, c.tim
        from tb_tim a left join tb_anggota_tim b on (a.kode_tim = b.kd_tim) LEFT JOIN t_jenis_tim c ON(a.id_jenis_tim=c.id_jenis_tim)
        where isnull(b.kd_tim)');
        return $query;
    }

    public function beri_tim()
    {
        $query = $this->db->query('SELECT * FROM `pegawai` WHERE nira NOT IN(SELECT nira FROM tb_anggota_tim WHERE nira)');
        return $query;
    }
    public function jenis_data()
    {
        $query = $this->db->get('t_jenis_tim');
        return $query;
    }
    public function input_jenis($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jenis($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_jenis($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
