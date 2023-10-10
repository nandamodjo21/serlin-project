<?php

class M_perawat extends CI_Model
{
   public function get_data($nir = null)
   {

      //    $query = $this->db->query('SELECT a.nira,b.nama,c.nama_ruangan,a.tanggal,d.jam_masuk,d.jam_keluar FROM tb_konfigurasi a JOIN pegawai b JOIN rawat_inap c JOIN tb_shift d ON (a.nira=b.nira AND a.kode_shift=d.kode_shift)');

      $ng = "";
      if ($nir != null) {
         $ng = " where nira='" . $nir . "'";
      }
      $query = $this->db->query("SELECT nira,nama from pegawai WHERE nira in(select nira from tb_anggota_tim  $ng ) ");
      return $query;
   }
   function get_jadwal($w = null)
   {
      $wh = '';
      if ($w != '') {
         $wh = " and ta.nira = " . $w . "";
      }


      $query = $this->db->query("SELECT p.nira,p.nama, tj.tim, r.nama_ruangan, s.shift,(CASE
      WHEN DATE_FORMAT(k.tanggal,'%W')='Sunday' THEN 'Minggu'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Monday' THEN 'Senin'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Tuesday' THEN 'Selasa'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Wednesday' THEN 'Rabu'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Thursday' THEN 'Kamis'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Friday' THEN 'Jumat'
      WHEN DATE_FORMAT(k.tanggal,'%W')='Saturday' THEN 'Sabtu'
      END) AS hari, k.tanggal,k.kode_konfigurasi
      FROM tb_konfigurasi k 
      LEFT JOIN tb_tim t ON (k.kd_tim= t.kode_tim) 
      LEFT JOIN t_jenis_tim tj ON (t.id_jenis_tim= tj.id_jenis_tim)
      LEFT JOIN rawat_inap r on (k.kode_ruangan= r.kode_ruangan) 
      LEFT JOIN tb_shift s on (k.kode_shift= s.kode_shift)
      JOIN tb_anggota_tim ta ON (k.kd_tim= ta.kd_tim)
      LEFT JOIN pegawai p on (ta.nira= p.nira) where k.status='1' " . $wh . "  order by k.tanggal asc ");
      return $query;
   }
}
