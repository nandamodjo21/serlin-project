<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Jenis Tim</h1>
</div>
<section class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#dataTim">
        <i class="fa fa-plus" class="text-bold"></i>Tambah Data Tim</button>
    </button>
    <table class="table table-hover" style="margin:20px auto;" border="1">
        <tr class="text-center bg-dark">
            <th>NO</th>
            <th>JENIS TIM</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;

        foreach ($tim as $t) : ?>

            <tr class="text-center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $t['tim'] ?></td>

                <td> <button class="btn btn-danger mb-3" data-toggle="modal" data-target="#modalHapusJenis<?= $t['id_jenis_tim']; ?>">
                        <i class="fa fa-trash" class="text-bold"></i></button></td>
                <td> <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ejenisModal<?= $t['id_jenis_tim']; ?>">
                        <i class="fa fa-edit" class="text-bold"></i></button></td>
            </tr>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<!-- Modal -->
<div class="modal fade" id="dataTim" tabindex="-1" aria-labelledby="dataTimLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="dataTimLabel">TAMBAH DATA JENIS TIM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url() . 'admin/tambah_jenis'; ?>">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Jenis Tim</label>
                            <!-- <input type="text" name="id_jenis" id="id_jenis"> -->
                            <input type="text" name="tim" id="tim" class="form-control" required oninvalid="this.setCustomValidity('Jenis tim wajib di isi')" oninput="setCustomValidity('')">
                        </div>
                        <div class="row mt-5">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn text-white" style="background-color: green; margin-left: 10px;">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Jenis Tim-->
<?php foreach ($tim as $t) : ?>
    <div class="modal fade" id="ejenisModal<?= $t['id_jenis_tim']; ?>" tabindex="-1" aria-labelledby="dataTimLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold" id="dataTimLabel">EDIT DATA JENIS TIM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/update_jenis/') . $t['id_jenis_tim'];  ?>">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Jenis Tim</label>
                                <!-- <input type="text" name="id_jenis" id="id_jenis"> -->
                                <input type="text" name="tim" id="tim" class="form-control" value="<?= $t['tim']; ?>">
                            </div>
                            <div class="row mt-5">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn text-white" style="background-color: green; margin-left: 10px;">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- modalHapusJenisTim -->
<?php
foreach ($tim as $t) : ?>
    <div class="modal fade" id="modalHapusJenis<?= $t['id_jenis_tim']; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus Data Jenis Tim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'admin/hapus_jenis/' . $t['id_jenis_tim']; ?>">
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