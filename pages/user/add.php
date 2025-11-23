<?php
$select_jurusan = "SELECT id_jurusan, kode_jurusan FROM jurusan";
$result_jurusan = mysqli_query($koneksi, $select_jurusan);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $peran = $_POST['peran'];

    if ($peran == 'admin' || $peran == 'kepala_sekolah' || $peran == 'wakasek_sarpras') {
        $jurusan = NULL;
    } else {
        $jurusan = $_POST['jurusan'];
    }

    $sql = "INSERT INTO pengguna (nama_pengguna, password_hash, nama_lengkap, role, jurusan_id)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $nama_pengguna, $password, $nama, $peran, $jurusan);
    $stmt->execute();

    if ($stmt) {
        header("Location: /inventori/user/list?status=success");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!-- Cards list -->
<section class="mb-4">
    <div class="bg-white rounded-md p-4 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-700 mb-3">➕ Tambah Barang</h2>

        <form class="space-y-3" action="" method="POST">
            <!-- Kode Barang -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="misal: Cecep Sigma"
                    class="w-full rounded-sm border-gray-300 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" placeholder="misal: cepsigma"
                    class="w-full rounded-sm border-gray-300 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input type="password" name="password" placeholder="********" class="w-full rounded-sm px-3 py-2 border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Peran</label>
                <select name="peran" class="w-full rounded-sm px-3 py-2 border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="admin">Admin</option>
                    <option value="kepala_sekolah">Kepala Sekolah</option>
                    <option value="wakasek_sarpras">Wakasek Sarpras</option>
                    <option value="kakom">Kepala Kompetensi Keahlian</option>
                    <option value="kepala_lab">Laboran</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                <select name="jurusan" class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <?php while ($row = mysqli_fetch_assoc($result_jurusan)) : ?>
                        <option value="<?php echo $row['id_jurusan']; ?>"><?php echo $row['kode_jurusan']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-2 pt-2">
                <button type="reset"
                    class="px-4 py-2 rounded-lg border text-sm text-gray-600 hover:bg-gray-100">Batal</button>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm shadow hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</section>