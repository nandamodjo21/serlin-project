<div class="conten-wrapper">
    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>
        <?php foreach ($pegawai as $p) : ?>
            <form action="<?php echo base_url('admin/update/') . $p['nira']; ?>" method="post">
                <div class="form-group">
                    <label>Nira</label>
                    <input type="hidden" name="nira" class="form-control" value="<?php echo $p['nira'] ?>">
                    <input type="text" name="nira" class="form-control" value="<?php echo $p['nira'] ?>">
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
<?php endforeach; ?>
</section>

</div>