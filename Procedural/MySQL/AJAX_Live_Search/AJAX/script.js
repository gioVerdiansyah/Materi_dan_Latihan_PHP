console.log("JavaScript ON!"); //test

// ambil element-elemet
let searchInput = document.querySelector("#search");
let cariButton = document.querySelector("#cari");
let containerTable = document.querySelector("#table-container");

// untuk menjalanka AJAX kita butuh trigger seperti button

// menambahkan event ketika searchInput di tulis
searchInput.addEventListener("keyup", function () {
  // keyup ini adalah event saat kita melepas tangan dari keyboard

  // buat object AJAX
  let xhr = new XMLHttpRequest();

  // mengecek kesiapan AJAX-nya
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // 4 = ready menerima, 200 sumber ditemukan
      containerTable.innerHTML = xhr.responseText;
      //   responseText ini akan menulis semua yang ada dari sumber xhr.open
    }
  };

  //eksekusi AJAX
  xhr.open("GET", "AJAX/value_search.php?key=" + searchInput.value, true);
  // request method, sumbernya dari mana, asynchronous = true
  xhr.send();
});
