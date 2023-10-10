<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
  <script src="<?= base_url('assets/'); ?>dist/js/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">

</head>
<style>
  .img {


    width: 20%;
    height: 20%;


  }
</style>
<div class="row" style="background: linear-gradient(180deg, #008B8B 10%, #AFEEEE 80%);">
  <div class="img">
    <img src="<?= base_url('assets'); ?>/dist/img/rsud.jpg" style="margin-top: 5%; margin-bottom:3%; margin-left:10%;" class="col-8 ">
  </div>

  <div class=" text-center align-items-center justify-content-between mb-4">

    <h1 style="margin-top: 4% ; " class="text-bold text-black h3 mb-3 text-gray-800">
      <marquee behavior="" direction="">Selamat Datang Di Penjadwalan Shift Perawat RSUD BOLIYOHUTO😊
      </marquee>
    </h1>
  </div>

  <!-- <div class="bg col-lg-3 col-md-4 col-xs-6 thumb"> -->

  <a class="col-1" style="margin-top: 3%; margin-left: 40px" href="<?= base_url('auth'); ?>">
    <h4 style="-webkit-text-fill-color: black;">LOGIN</h4>
  </a>
</div>

<div class="container" style="margin-top: 2%;">
  <div class="row">
    <div class="col-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- <a id="cetak" class="btn btn-warning float-right" style="margin-right: 1%;">
            <i class="fas fa-print"></i>
          </a> -->
          <div><label>Silahkan Cari Nama Anda:</label></div>
          <select name="nurse" id="nurse" class="select2 form-control" data-live-search="true">
            <option value="">--Pilih Semua--</option>
            <?php foreach ($perawat as $p) { ?>
              <option value="<?= $p->nira; ?>"><?= $p->nama; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div>
        <table style="margin-top: 2%; margin-right: 5%;" class="table table-hover text-center" border="1">
          <tr class="text-center text-white" style="background-color: darkcyan;">
            <th>No</th>
            <th>Nama</th>
            <th>Nama Ruangan</th>
            <th>Shift</th>
            <th>Tim</th>
            <th>Hari</th>
            <th>Tanggal</th>
          </tr>
          <tbody id="schedule"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Control Sidebar -->

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- asset select -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<script>
  // ajax select
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });

  // ajax jadwal
  $(document).ready(function() {
    $('#nurse').change(function() {
      var id_nurse = $(this).val();
      console.log(id_nurse);
      $.ajax({
        url: "<?= base_url('perawat/search') ?>",
        method: 'POST',
        data: {
          idnurse: id_nurse
        },
        dataType: 'json',
        success: function(response) {
          // console.log(response);
          $('#schedule')
            .empty()
          $.each(response, function(index, data) {
            $('#schedule').append('<tr><td>' + (index + 1) + '</td>' + '<td>' + data['nama'] + '</td>' + '<td>' + data['nama_ruangan'] + '</td>' + '<td>' + data['shift'] + '</td>' + '<td>' + data['tim'] + '</td>' + '<td>' + data['hari'] + '</td>' + '<td>' + data['tanggal'] + '</td></tr>');
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