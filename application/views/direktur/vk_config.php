<div class="row">
    <div class="container" style="margin-top: 2%;">
        <div class="row">
            <div class="col-12">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 sm-2">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center text-white" style="background-color: darkcyan;">
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Nira</th>
                                        <th>Nama</th>
                                        <th>Shift</th>
                                        <th>Tim</th>
                                        <!-- <th>Hari</th> -->
                                        <th>Tanggal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jadwal as $j) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $j['nama_ruangan']; ?></td>
                                            <td><?= $j['nira']; ?></td>
                                            <td><?= $j['nama']; ?></td>
                                            <td><?= $j['shift']; ?></td>
                                            <td><?= $j['tim']; ?></td>
                                            <td><?= $j['hari']; ?>,<?= $j['tanggal']; ?></td>

                                        </tr>
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>