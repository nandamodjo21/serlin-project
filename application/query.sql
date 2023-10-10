SELECT a.nira,b.nama,c.nama_ruangan,a.tanggal,d.jam_masuk,d.jam_keluar FROM tb_konfigurasi a JOIN pegawai b JOIN rawat_inap c JOIN tb_shift d ON (a.nira=b.nira AND a.kode_shift=d.kode_shift)

SELECT t.nama_tim,r.nama_ruangan, s.shift, k.tanggal FROM `tb_konfigurasi` k JOIN tb_tim t ON(k.kode_tim=t.kode_tim) JOIN rawat_inap r ON(k.kode_ruangan=r.kode_ruangan) JOIN tb_shift s ON(k.kode_shift=s.kode_shift) WHERE nama_tim='A'
<?php foreach ($jadwal as $j) { ?>
 <option value="<?= $j->kode_ruangan; ?>"><?= $j->nama_ruangan; ?></option>
                <?php } ?>

        SELECT a.*, b.kd_tim, c.tim
        from tb_tim a
          left join tb_anggota_tim b on (a.kode_tim = b.kd_tim) LEFT JOIN t_jenis_tim c ON(a.id_jenis_tim=c.id_jenis_tim)
        where isnull(b.kd_tim)

        SELECT * FROM `pegawai` WHERE nira NOT IN(SELECT nira FROM tb_anggota_tim WHERE kd_tim)

        SELECT a.kode_tim,b.tim 
        from tb_tim a,t_jenis_tim b where a.id_jenis_tim=b.id_jenis_tim 
        and month(a.waktu)=month(now()) AND a.kode_tim NOT IN(SELECT kode_tim FROM tb_anggota_tim)'

        SELECT k.*, t.*, r.*,s.* 
    FROM tb_konfigurasi k 
    LEFT JOIN tb_tim t ON (k.kd_tim= t.kode_tim) 
    LEFT JOIN rawat_inap r on (k.kode_ruangan= r.kode_ruangan) 
    LEFT JOIN tb_shift s on (k.kode_shift= s.kode_shift)


      SELECT k.*, t.*, r.*,s.*,p.*
    FROM tb_konfigurasi k 
    LEFT JOIN tb_anggota_tim ta ON (k.kd_tim= ta.kd_tim)
    LEFT JOIN pegawai p on (ta.nira= p.nira)
    LEFT JOIN tb_tim t ON (k.kd_tim= t.kode_tim) 
    LEFT JOIN rawat_inap r on (k.kode_ruangan= r.kode_ruangan) 
    LEFT JOIN tb_shift s on (k.kode_shift= s.kode_shift)

    SELECT p.nama, tj.tim, r.nama_ruangan, s.shift
    FROM tb_konfigurasi k 
    LEFT JOIN tb_tim t ON (k.kd_tim= t.kode_tim) 
    LEFT JOIN t_jenis_tim tj ON (t.id_jenis_tim= tj.id_jenis_tim)
    LEFT JOIN rawat_inap r on (k.kode_ruangan= r.kode_ruangan) 
    LEFT JOIN tb_shift s on (k.kode_shift= s.kode_shift)
    JOIN tb_anggota_tim ta ON (k.kd_tim= ta.kd_tim)
    LEFT JOIN pegawai p on (ta.nira= p.nira)
