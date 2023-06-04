function getDataProduk(id, nama, gambar, varian, ukuran, harga, deskripsi) {
    console.log(id);
    $("#produk-nama").html(nama);
    $("#produk-varian").html(varian);
    $("#produk-ukuran").html(ukuran);
    $("#produk-harga").html("Rp."+harga);
    $("#produk-deksripsi").html(deskripsi);
    $("#produk-gambar").attr("src", `/${gambar}`);
    $("#produk-edit").attr("href", `/produk/edit/${id}`);
}
