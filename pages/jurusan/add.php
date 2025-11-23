<?php

if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO jurusan (kode,nama,keterangan) VALUES ('$kode','$nama','$keterangan')";
    $insert = mysqli_query($koneksi, $query);
    if ($insert) {
        header("Location: /inventori/jurusan/list");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

?>

<!-- Form Tambah Barang -->
<section class="bg-white w-100 rounded-xl shadow-md p-6 mb-6 ">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">+ Tambah Barang</h2>
    <form id="formTambah" class="space-y-4" method="post" action="">
        <div>
            <label class="block text-sm font-medium text-gray-600">Kode Jurusan</label>
            <input type="text" id="nama" placeholder="Contoh: ATPH" name="kode" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300" required />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Nama Jurursan</label>
            <input type="text" id="kategori" placeholder="Contoh: Komputer" name="nama" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300" required />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Keterangan</label>
            <input type="text" id="jumlah" min="1" placeholder="Contoh: 10" name="keterangan" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300" required />
        </div>
        <button type="submit" name="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600">Tambah Jurusan</button>
    </form>
</section>