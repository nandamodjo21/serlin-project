<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data pegawai</h1>
</div>

<section class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" class="text-bold"></i>Tambah Data</button>
    </button>

    <a id="cetak" class="btn btn-warning mb-3">
        <i class="fas fa-print"></i>
    </a>

    <table id="example2" class="table table-hover" style="margin:20px auto;" border="1">
        <tr class="text-center bg-dark">

            <th>NO</th>
            <th>NIRA</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>ALAMAT</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        foreach ($pegawai as $p) : ?>

            <tr class="text-center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $p['nira'] ?></td>
                <td><?php echo $p['nama'] ?></td>
                <td><?php echo $p['jabatan'] ?></td>
                <td><?php echo $p['alamat'] ?></td>

                <td> <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusPegawai<?= $p['nira']; ?>">
                        <i class="fa fa-trash" class="text-bold"></i></button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editPegawai<?= $p['nira']; ?>">
                        <i class="fa fa-edit" class="text-bold"></i></button>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <!-- <script>
        window.print();
    </script> -->
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="exampleModalLabel">TAMBAH DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url() . 'admin/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label>Nira</label>
                        <input type="text" id="nira" name="nira" value="<?php echo set_value('nira'); ?>" class="form-control" required oninvalid="this.setCustomValidity('Nira wajib di isi dan tidak bisa sama')" oninput="setCustomValidity('')">

                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required oninvalid="this.setCustomValidity('Nama wajib di isi')" oninput="setCustomValidity('')">

                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control" required oninvalid="this.setCustomValidity('jabatan wajib di pilih')" oninput="setCustomValidity('')">
                            <option value="">Pilih</option>
                            <option value="perawat">Perawat</option>
                            <option value="kepala ruang">Kepala ruang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('alamat wajib di isi')" oninput="setCustomValidity('')">
                    </div>
                    <div class="row mt-5">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn" style="background-color: Green; margin-left: 10px;">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- modalHapusAnggota -->
<?php

foreach ($pegawai as $p) : ?>
    <div class="modal fade" id="modalHapusPegawai<?= $p['nira']; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus Data Anggota Tim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'admin/hapus/' . $p['nira']; ?>">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- editmodal -->
<?php
foreach ($pegawai as $p) : ?>
    <div class="modal fade" id="editPegawai<?= $p['nira']; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">ubah pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('admin/update/') . $p['nira']; ?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nira</label>
                            <input type="hidden" name="nira" class="form-control" value="<?php echo $p['nira'] ?>">
                            <input type="text" name="idnurs" class="form-control" value="<?php echo $p['nira'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $p['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?= $p['jabatan'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $p['alamat'] ?>">
                        </div>

                        <button type="close" class="btn btn-danger">Keluar</button>
                        <button type="submit" class="btn text-white" style="background-color: green;">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<!-- footer  -->
<!--  -->