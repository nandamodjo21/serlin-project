<!-- <div class="row"> -->
<div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-md-12 col-sm-12">
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
                    <!-- <div class="row"> -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- /.card-header -->
                        <!-- <div class="card-body"> -->
                        <!-- <div class="row"> -->
                        <!-- <div class="col-lg-12"> -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center text-white" style="background-color: darkcyan;">
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Nira</th>
                                    <th>Nama</th>
                                    <th>Shift</th>
                                    <th>Tim</th>
                                    <th>Tanggal</th>
                                    <th>
                                        <?php if ($jadwals[0] == '1') {
                                            $j = "success";
                                        } elseif ($jadwals[0] == '0') {
                                            $j = "danger";
                                        } ?>
                                        <button id="bah" class="btn btn-<?= $j; ?> ubahStatusAll" data-status="<?= $jadwals[0]; ?>">
                                            <?= ($jadwals[0] == '1') ? '<i class="fas fa-fw fa-check"></i>' : '<i class="fas fa-fw fa-times"></i>'; ?>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="valid_jadwal">
                                <?php
                                $no = 0;

                                foreach ($jadwal as $jd) {
                                    if ($jd['status'] == '1') {
                                        $class = "success";
                                    } elseif ($jd['status'] == '0') {
                                        $class = "danger";
                                    } else {
                                        $class = "";
                                    }
                                    $no++;
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td><?= $jd['nama_ruangan']; ?></td>
                                        <td><?= $jd['nira']; ?></td>
                                        <td><?= $jd['nama']; ?></td>
                                        <td><?= $jd['shift']; ?></td>
                                        <td><?= $jd['tim']; ?></td>
                                        <td><?= $jd['hari']; ?>,<?= $jd['tanggal']; ?></td>
                                        <td>
                                            <button class="btn btn-<?= $class; ?> ubahStatus" data-kd="<?= $jd['kode_konfigurasi']; ?>" data-status="<?= $jd['status']; ?>">
                                                <?= ($jd['status'] == '1') ? '<i class="fas fa-fw fa-check"></i>' : '<i class="fas fa-fw fa-times"></i>'; ?>
                                            </button>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <!-- </div>
                                </div>
                            </div> -->

                    </div>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": true,
            "deferRender": true
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "deferRender": true
        });
    });
</script>
<script>
    $('#shf').hide();
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

                        if (data['status'] === '0') {
                            statusku = "<a class='btn btn-danger' href='update_status1/" + data['kode_konfigurasi'] + "'><i class='fas fa-times'></i></a>";
                        } else if (data['status'] === '1') {
                            statusku = "<a class='btn btn-success' href='update_status0/" + data['kode_konfigurasi'] + "'><i class='fas fa-check'></i></a>";
                        } else {

                        }
                        // alert(statusku);
                        $('#valid_jadwal').append('<tr class="text-center"><td>' + (index + 1) + '</td>' + '<td>' + data['nama_ruangan'] + '</td>' + '<td>' + data['nira'] + '</td>' + '<td>' + data['nama'] + '</td>' + '<td>' + data['shift'] + '</td>' + '<td>' + data['tim'] + '</td>' + '<td>' + data['hari'] + ',' + data['tanggal'] + '</td>' + '<td>' + statusku + '</td></tr>');
                    });
                }

            })
        });

    });
</script>



<!-- // ===================ajax update satu -->

<script>
    $(document).on('click', '.ubahStatus', function() {

        var id = $(this).data('kd');
        var status = $(this).data('status');
        $.ajax({
            type: 'ajax',
            method: 'POST',
            url: 'updateStatus',
            dataType: 'json',
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    if (status == '1') {
                        $('.ubahStatus[data-kd="' + id + '"]').html('<i class="fas fa-fw fa-times"></i>').removeClass('btn-success').addClass('btn-danger').data('status', '0');

                    } else {
                        $('.ubahStatus[data-kd="' + id + '"]').html('<i class="fas fa-fw fa-check"></i>').removeClass('btn-danger').addClass('btn-success').data('status', '1');
                    }
                } else {
                    // alert(response.message);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
            }
        });


        location.reload();
    });
</script>

<!-- // ===================ajax update semua -->

<script>
    $(document).on('click', '.ubahStatusAll', function() {
        var status = $(this).data('status');
        $.ajax({
            type: 'ajax',
            method: 'POST',
            url: '<?= base_url('kepala_ruang/updateStatusAll'); ?>',
            dataType: 'json',
            data: {
                status: status
            },
            success: function(response) {
                if (response.success) {
                    // alert(response.message);
                    if (status == '1') {
                        $('.ubahStatusAll[data-status="' + status + '"]').html('<i class="fas fa-fw fa-times"></i>').removeClass('btn-success').addClass('btn-danger').data('status', '0');
                    } else {
                        $('.ubahStatusAll[data-status="' + status + '"]').html('<i class="fas fa-fw fa-check"></i>').removeClass('btn-danger').addClass('btn-success').data('status', '1');
                    }
                } else {
                    // alert(response.message);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
            }
        });
        location.reload();

    });
</script>
</body>

</html>