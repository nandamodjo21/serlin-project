<body>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="background: linear-gradient(180deg, #AFEEEE 	 0%, #F0FFFF 100%);">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">SET JADWAL</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-bold">
                    <p>INSERT DATA JADWAL</p>
                    <form method="post" action="<?= base_url('admin/set_jadwal/' . $kdr . '/' . $tgl); ?>">
                        <div class="form-group">
                            <label>Pagi</label>
                            <select name="pagi" id="pagi" class="form-control" required oninvalid="this.setCustomValidity('Pagi wajib di pilih')" oninput="setCustomValidity('')">
                                <option>--pilih--</option>
                                <?php foreach ($jadwal as $j) { ?>
                                    <option value="<?= $j['kode_tim']; ?>"><?= $j['tim']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Siang</label>
                            <select name="siang" id="siang" class="form-control" required oninvalid="this.setCustomValidity('Siang wajib di pilih')" oninput="setCustomValidity('')">
                                <option>--pilih--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Malam</label>
                            <select name="malam" id="malam" class="form-control" required oninvalid="this.setCustomValidity('Malam wajib di pilih')" oninput="setCustomValidity('')">
                                <option>--pilih--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lepas</label>
                            <select name="lepas" id="lepas" class="form-control" required oninvalid="this.setCustomValidity('Nama ruangan wajib di pilih')" oninput="setCustomValidity('')">
                                <option>--pilih--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Libur</label>
                            <select name="libur" id="libur" class="form-control" required oninvalid="this.setCustomValidity('Libur wajib di pilih')" oninput="setCustomValidity('')">
                                <option>--pilih--</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?= date('Y-m-d'); ?>" name="tanggal" class="form-control" required oninvalid="this.setCustomValidity('Tanggal wajib di isi')" oninput="setCustomValidity('')">
                        </div>
                        <button type="close" class="btn btn-danger" action="<?= base_url('admin/kalender') ?>">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="http://localhost/proyek_akhir/assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pagi').change(function() {
            var kode_tim = $(this).val();
            console.log(kode_tim);
            $.ajax({
                url: "<?= base_url('admin/filter_shift') ?>",
                method: 'POST',
                data: {
                    kodetim: kode_tim
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#siang')
                        .empty()
                        .append('<option value="0">pilih tim</option>')
                    $.each(response, function(index, data) {
                        $('#siang').append('<option value="' + data['kode_tim'] + '">' + data['tim'] + '</option>');
                    });
                }

            })
        });
        $('#siang').change(function() {
            var kode_tim = $(this).val();
            console.log(kode_tim);
            $.ajax({
                url: "<?= base_url('admin/filter_shift') ?>",
                method: 'POST',
                data: {
                    kodetim: kode_tim
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#malam')
                        .empty()
                        .append('<option value="0">pilih tim</option>')
                    $.each(response, function(index, data) {
                        $('#malam').append('<option value="' + data['kode_tim'] + '">' + data['tim'] + '</option>');
                    });
                }

            })
        });
        $('#malam').change(function() {
            var kode_tim = $(this).val();
            console.log(kode_tim);
            $.ajax({
                url: "<?= base_url('admin/filter_shift') ?>",
                method: 'POST',
                data: {
                    kodetim: kode_tim
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#lepas')
                        .empty()
                        .append('<option value="0">pilih tim</option>')
                    $.each(response, function(index, data) {
                        $('#lepas').append('<option value="' + data['kode_tim'] + '">' + data['tim'] + '</option>');
                    });
                }

            })
        });
        $('#lepas').change(function() {
            var kode_tim = $(this).val();
            console.log(kode_tim);
            $.ajax({
                url: "<?= base_url('admin/filter_shift') ?>",
                method: 'POST',
                data: {
                    kodetim: kode_tim
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#libur')
                        .empty()
                        .append('<option value="0">pilih tim</option>')
                    $.each(response, function(index, data) {
                        $('#libur').append('<option value="' + data['kode_tim'] + '">' + data['tim'] + '</option>');
                    });
                }

            })
        });
    })
</script>