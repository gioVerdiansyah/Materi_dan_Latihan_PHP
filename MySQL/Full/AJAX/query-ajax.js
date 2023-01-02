$(document).ready(function () {
  // $ = jQuery, ini memanggil library jquerynya

  // mnghilangkan tombol cari
  $(".kelompok .col-1 #cari").hide();

  // event ketika keyword ditulis
  $("#search").on("keyup", function () {
    // menampilkan gif load
    $("#load").show();

    // ajax menggunakan load
    // $("#table-container").load(
    //   "AJAX/value-search.php?key=" + $("#search").val()
    // );

    // ajax menggunakan $.get()
    $.get("AJAX/value.php?key=" + $("#search").val(), function (data) {
      $("#table-container").html(data); //innerHTML
      $("#load").hide(); // setelah menampilkan #table-container maka sembunyikan loadnya
    });
    // setelah datanya diambil lalu lakukan sesuatu(fungsi)
    // parameter data ini sama aja dengan xhr.responseText
  });
  // ketika onkeyup maka jalankan fungsi, load adalah fungsi untuk meload ke url yang dituju(hanya GET), val() adalah value
});
// jquery tolong ambilkan document, lalu jika document tersebut siap maka jalankan function berikut
