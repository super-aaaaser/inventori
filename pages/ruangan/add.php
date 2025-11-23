<?php
$select_jurusan = "SELECT id_jurusan, kode FROM jurusan";
$result_jurusan = mysqli_query($koneksi, $select_jurusan);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_ruangan = $_POST['nama_ruangan'];
    $jurusan = $_POST['jurusan'];
    $keterangan = $_POST['keterangan'];

    if (empty($jurusan) && empty($keterangan)) {
        header("Location: /inventori/ruangan/add?status=kosong");
        exit;
    }

    $sql = "INSERT INTO ruangan (nama_ruangan, jurusan_id, keterangan)
            VALUES (?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sis", $nama_ruangan, $jurusan, $keterangan);
    $stmt->execute();

    if ($stmt) {
        header("Location: /inventori/ruangan/list?status=success");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!-- Cards list -->
<section class="mb-4">
    <div class="bg-white rounded-md p-4 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-700 mb-3">➕ Tambah Ruangan</h2>

        <form class="space-y-3" action="" method="POST">
            <!-- Kode Barang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" placeholder="misal: LAB TEFA"
                    class="w-full rounded-sm border border-gray-300 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                <select name="jurusan" class="w-full rounded-sm px-3 py-2 border border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <?php while ($row = mysqli_fetch_assoc($result_jurusan)) : ?>
                        <option value="<?php echo $row['id_jurusan']; ?>"><?php echo $row['kode']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>
                <?php if (isset($_GET['error'])) : ?>
                    <p class="text-red-500"><?php echo $_GET['error']; ?></p>
                <?php endif; ?>
                <label class="block text-sm font-medium text-gray-600 mb-1">Keterangan</label>
                <input type="text" name="keterangan"
                    class="w-full rounded-sm border border-gray-300 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-2 pt-2">
                <a href="/inventori/ruangan/list"
                    class="px-4 py-2 rounded-sm border text-sm text-gray-600 hover:bg-gray-100">Batal</a>
                <button type="submit"
                    class="px-4 py-2 rounded-sm bg-orange-600 gradient-to-r from-orange-400 to-orange-600 text-white text-sm shadow hover:bg-orange-700">Simpan</button>
            </div>
        </form>
    </div>
</section>