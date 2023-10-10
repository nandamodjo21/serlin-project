$(document).ready(function(){
    // var keyword = document.getElementById('keyword');
    // keyword.addEventListener('keyup',function(){
    //     console.log('SCRIPT BERJALAN BAGUS');
    // });

    $('#tombol-cari').hide();
    //KETIKA DI KETIK
    // $('#keyword').on('keyup',function(){
    //     $('#container').load('perawat/v_perawat?keyword' + $('#keyword').val());
        
    //get
    $.get('perawat/v_perawat?keyword=' + $('#keyword').val(),function(data){

        $('#container').html(data)
    });
    });