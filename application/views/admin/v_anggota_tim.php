<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Anggota Tim</h1>
</div>
<section class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#mxModal">
        <i class="fa fa-plus" class="text-bold"></i>Tambah Data</button>
    </button>
    <table class="table table-hover" style="margin:20px auto;" border="1">
        <tr class="text-center bg-dark">
            <th>No</th>
            <th>TIM</th>
            <th>NAMA PERAWAT</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($tim as $t) : ?>
            <tr class="text-center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $t['tim'] ?></td>
                <td><?php echo $t['nama'] ?></td>

                <td> <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalHapusAnggota<?= $t['kode_tim']; ?>">
                        <i class="fa fa-trash" class="text-bold"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- <script>
        window.print();
    </script> -->
</section>

<!-- Modal tambah data anggota -->
<div class="modal fade" id="mxModal" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="myModalLabel">TAMBAH DATA ANGGOTA TIM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url() . 'admin/tambah_anggota_tim'; ?>">
                    <div class="form-group">
                        <label>Tim</label>
                        <select name="tim" id="tim" class="form-control" required oninvalid="this.setCustomValidity('Tim wajib di isi dan tidak bisa sama')" oninput="setCustomValidity('')">
                            <option>---Pilih---</option>
                            <?php foreach ($nama as $n) { ?>
                                <option value="<?= $n->kode_tim; ?>"><?= $n->tim; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Perawat</label>
                            <input type="hidden" name="nira" id="nira">
                            <select class="select2bs4" id="nama" name="nama" multiple="multiple" data-placeholder="Data tidak ditemukan" style="width: 100%;">
                                <?php foreach ($perawat as $p) { ?>
                                    <option value="<?= $p->nira; ?>"><?= $p->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn" style="background-color: green; margin-left: 10px;">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- modalHapusAnggota -->
<?php

foreach ($tim as $t) : ?>
    <div class="modal fade" id="modalHapusAnggota<?= $t['kode_tim']; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus Data Anggota Tim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'admin/hapus_anggota_tim/' . $t['kode_tim']; ?>">
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