$(document).ready(function () {
    const url = $('body').data('url');//BASEURL

    $(".add").click(function (e) { 
        e.preventDefault();
        $("#formModalLabel").text("Tambah Data Mahasiswa");
        $(".modal-footer button[type = submit]").text("Tambah Data Mahasiswa");
        $('form').attr('action', `${url}mahasiswa/tambah`);
        $('#nis').val('');
        $('#nama').val('');
        $('#jurusan').val('RPL');
        $('#email').val('');

        $('#inputHidden').remove();
    })


    // jika tombol update ditekan
    $(".update").click(function (e) { 
        e.preventDefault();
        // mendapatkan id
        const id = $(this).data('id');
                
        $("#formModalLabel").text("Ubah Data Mahasiswa");
        $(".modal-footer button[type = submit]").text("Ubah Data Mahasiswa");

        // mengubah action form
        $('form').attr('action', `${url}mahasiswa/ubah`);

        // ! Menjalankan AJAX
        $.ajax({
            url: `${url}mahasiswa/getubah`,
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nis').val(data.nis);
                $('#nama').val(data.nama);
                $('#jurusan').val(data.jurusan);
                $('#email').val(data.email);

                $('#inputHidden').attr('value', data.id);
            }
        })
    });
});