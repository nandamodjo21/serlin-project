<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar" style="background: linear-gradient(to right, #008B8B 10%, #AFEEEE 80%);">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </nav>


        <div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="keluarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newRoleModalLabel">are you ready to leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Leave</a>
                    </div>

                </div>
            </div>
        </div>