<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Ruangan</h1>
</div>
<section class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" class="text-bold"></i>Tambah Data</button>
    <table class="table table-hover" style="margin:20px auto; " border="1">
        <tr class="text-center bg-dark">
            <th>NO</th>
            <th>NAMA-NAMA RUANGAN</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $no = 1;

        foreach ($ruangan as $r) { ?>

            <tr class="text-center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $r['nama_ruangan'] ?></td>

                <td> <button class="btn btn-danger mb-3" data-toggle="modal" data-target="#modalHapusRuangan<?= $r['kode_ruangan']; ?>">
                        <i class="fa fa-trash" class="text-bold"></i></button></td>
                <td> <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#eruanganModal<?= $r['kode_ruangan']; ?>">
                        <i class="fa fa-edit" class="text-bold"></i></button></td>
            </tr>
        <?php } ?>
    </table>
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
                <form method="post" action="<?php echo base_url() . 'admin/tambah_ruangan'; ?>">
                    <div class="form-group">
                        <label>Nama-nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" required oninvalid="this.setCustomValidity('Ruangan wajid di isi')" oninput="setCustomValidity('')">
                        <form method="post" action="<?php echo base_url() . 'admin/tambah_ruangan'; ?>">
                            <div class="row mt-5">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn" style="background-color: green; margin-left: 10px;">Simpan</button>
                            </div>
                        </form>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($ruangan as $r) : ?>
    <div class="modal fade" id="eruanganModal<?= $r['kode_ruangan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold" id="exampleModalLabel">EDIT DATA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/update_ruangan/') . $r['kode_ruangan']; ?>">
                        <div class="form-group">

                            <label>Nama-nama Ruangan</label>
                            <input type="text" name="nama_ruangan" class="form-control" value="<?= $r['nama_ruangan']; ?>">
                            <form method="post" action="<?php echo base_url() . 'admin/update_ruangan'; ?>">
                                <div class="row mt-5">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn" style="background-color: green; margin-left: 10px;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modalHapusRuangan -->
<?php
foreach ($ruangan as $r) : ?>
    <div class="modal fade" id="modalHapusRuangan<?= $r['kode_ruangan']; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus Data Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'admin/hapus_ruangan/' . $r['kode_ruangan']; ?>">
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