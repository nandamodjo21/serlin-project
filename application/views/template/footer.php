<div class="card-footer">
</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer" style="background: linear-gradient(to right, #008B8B 10%, #AFEEEE 80%);">
    <div class="float-right d-none d-sm-block">
    </div>

</footer>


<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- script modal -->
<script>
    $(document).ready(function() {
        $("#myModal").modal('show');

    });
    $('#nama').change(function() {
        var select = $(this).val();
        $('#nira').val(select)

    });
    // ajax select
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    });
</script>
<script>
    $('#jenis').change(function() {
        var select = $(this).val();
        $('#id_jenis').val(select)
        console.log(select);


    });

    // ajax select
    // $(function() {
    //     //Initialize Select2 Elements
    //     $('.select2').select2()
    //     //Initialize Select2 Elements
    //     $('.select1').select2({
    //         theme: 'bootstrap4'
    //     });

    // });
</script>
<script>
    $(document).ready(function() {
        $('#cetak').click(function() {
            window.print();
        });
    })
</script>