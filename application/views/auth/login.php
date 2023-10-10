<div class="login-box">
    <div class="login-logo">
        <a class="text-black" href="<?= site_url('perawat'); ?>">
            <h4>jadwal perawat</h4>
        </a>
        <a class="text-black"><b style="-webkit-text-fill-color:  LightSeaGreen;" class="text-bold">RSUD</b> Boliyohuto</a>


    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg text-bold">Silahkan Login terlebih dahulu</p>

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>');  ?>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', ' <small class="text-danger pl-3">', '</small>');  ?>
                <div class="row" style="margin-left: 35%;">
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-block text-white text-bold" style="background-color: DarkCyan;">Login</button>

                    </div>


                </div>

            </form>
        </div>
    </div>
</div>