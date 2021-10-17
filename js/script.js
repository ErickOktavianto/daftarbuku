$(document).ready(function(){
    // hilangkan tombol cari
    $('#tombol-cari').hide();
// event ketika keyword dituliskan
    $('#keyword').on('keyup',function(){
        // munculkan loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/buku.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/buku.php?keyword=' + $('#keyword').val(),function(data){
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});