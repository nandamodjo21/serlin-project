<div class="row">
    <div class="container" style="margin-top: 2%;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div><label>Silahkan Cari Nama Anda:</label></div>
                        <select name="nama" id="nama" class="select2 form-control" data-live-search="true">
                            <option value="">--Pilih--</option>
                            <?php foreach ($perawat as $p) { ?>
                                <option value="<?= $p->nira; ?>"><?= $p->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div id="shf" class="form-group" style="margin-top: 1%;">
                    <label>Shift</label>
                    <select name="shift" id="shift" class="form-control">
                        <option>--pilih--</option>
                        <?php foreach ($shift as $s) { ?>
                            <option value="<?= $s->kode_shift; ?>"><?= $s->shift; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <thead>

                    <div class="container" style="margin-top: 2%;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12 ">

                                            <div><?= $this->session->flashdata('pesan'); ?></div>
                                            <a href="<?= base_url('admin/hapus_jadwal'); ?>" class="float-right btn-danger btn">Hapus Jadwal</a>
                                            <a id="cetak" class="btn btn-warning float-right" style="margin-right: 1%;">
                                                <i class="fas fa-print"></i>
                                            </a>
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
                                                <tbody id="valid_jadwal">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($jadwal as $jd) { ?>
                                                        <tr class="text-center">
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $jd['nama_ruangan']; ?></td>
                                                            <td><?= $jd['nira']; ?></td>
                                                            <td><?= $jd['nama']; ?></td>
                                                            <td><?= $jd['shift']; ?></td>
                                                            <td><?= $jd['tim']; ?></td>
                                                            <td><?= $jd['hari']; ?>,<?= $jd['tanggal']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <!-- <script>
                                                window.print();
                                            </script> -->
                                        </div>
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
                    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script> -->

                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": true,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": true,
                                "responsive": true,
                            });
                        });
                    </script>
                    <script>
                        $('#tgl').hide();
                        $('#shf').hide();
                        $('#tm').hide();
                        $('#tgl').hide();
                        $('#nama').change(function() {
                            $('#shf').show();
                            $('#shf').change(function() {
                                var id_nama = $('#nama').val();
                                var id_shift = $('#shift').val();
                                console.log(id_nama);
                                console.log(id_shift);
                                $.ajax({
                                    url: "<?= base_url('kepala_ruang/search') ?>",
                                    method: 'POST',
                                    data: {
                                        idnama: id_nama,
                                        idshift: id_shift
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log(response);
                                        $('#valid_jadwal')
                                            .empty()
                                        $.each(response, function(index, data) {
                                            $('#valid_jadwal').append('<tr class="text-center"><td>' + (index + 1) + '</td>' + '<td>' + data['nama_ruangan'] + '</td>' + '<td>' + data['nira'] + '</td>' + '<td>' + data['nama'] + '</td>' + '<td>' + data['shift'] + '</td>' + '<td>' + data['tim'] + '</td>' + '<td>' + data['hari'] + ',' + data['tanggal'] + '</td></tr>');
                                        });
                                    }

                                })
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#cetak').click(function() {
                                window.print();
                            });
                        })
                    </script>
                    </body>

                    </html>