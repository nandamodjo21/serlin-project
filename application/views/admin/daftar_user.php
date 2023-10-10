<section class="content">
    <?= $this->session->flashdata('pesan'); ?>
    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" class="text-bold"></i>Tambah Data</button>
    </button>
    <table class="table table-bordered">
        <tr class="text-center bg-dark">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role id</th>
            <th>Is_active</th>
            <th>Date Created</th>
            <th colspan="2">Aksi</th>
        </tr>


        <?php
        $no = 1;

        foreach ($user as $u) : ?>

            <tr class="text-center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->email ?></td>
                <td><?php echo $u->image ?></td>
                <td><?php echo $u->role_id ?></td>
                <td><?php echo $u->is_active ?></td>
                <td><?php echo $u->date_created ?></td>

                <td> <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#ModalHapus<?= $u->id; ?>">
                        <i class="fa fa-trash" class="text-bold"></i></button></td>
                <td> <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalEdit<?= $u->id; ?>">
                        <i class="fa fa-edit" class="text-bold"></i></button></td>

            </tr>
        <?php endforeach; ?>
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
                <form method="post" action="<?php echo base_url() . 'admin/tambah_aksi';
                                            $u->id ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" required oninvalid="this.setCustomValidity('nama wajib di isi dan tidak bisa sama')" oninput="setCustomValidity('')">

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required oninvalid="this.setCustomValidity('email wajib di isi')" oninput="setCustomValidity('')">

                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="text" name="image" class="form-control" required oninvalid="this.setCustomValidity('image wajib di isi')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Role id</label>
                        <input type="text" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('alamat wajib di isi')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Is_active</label>
                        <input type="text" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('alamat wajib di isi')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Date Created</label>
                        <input type="text" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('alamat wajib di isi')" oninput="setCustomValidity('')">
                    </div>
                    <div class="row mt-5">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn" style="background-color: purple; margin-left: 10px;">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($user as $u) : ?>
    <div class="modal fade" id="ModalEdit<?= $u->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold" id="exampleModalLabel">EDIT DATA USER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'user/edit_user';
                                                $u->id; ?>">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Role id</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Is_active</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date Created</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="row mt-5">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn" style="background-color: green; margin-left: 10px;">Simpan</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($user as $u) : ?>
    <div class="modal fade" id="ModalHapus<?= $u->id; ?>" tabindex="-1" aria-labelledby="mxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'admin/hapus_user/' . $u->id; ?>">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>