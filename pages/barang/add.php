<?php

if (isset($_SESSION['peran']) && $_SESSION['peran'] == 'admin' || $_SESSION['peran'] == 'kepala_sekolah' || $_SESSION['peran'] == 'wakasek_sarpras') {
    $select_ruangan = "SELECT * FROM ruangan";
    $select_barang_jenis = "SELECT * FROM barang_jenis";
} else {
    $select_ruangan = "SELECT * FROM ruangan WHERE jurusan_id = " . $_SESSION['jurusan_id'];
    $select_barang_jenis = "SELECT * FROM barang_jenis WHERE jurusan_id = " . $_SESSION['jurusan_id'];
}

$result_ruangan = mysqli_query($koneksi, $select_ruangan);
$result_barang_jenis = mysqli_query($koneksi, $select_barang_jenis);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $ruangan = $_POST['ruangan'];
    $kondisi = $_POST['kondisi'];
    $tahun_perolehan = $_POST['tahun_perolehan'];
    $sumber = $_POST['sumber'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO barang_inventaris (kode, nama, kategori, kondisi, ruangan_id, tahun_perolehan, sumber, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssisisss", $kode, $nama_barang, $jenis_barang, $kondisi, $ruangan, $tahun_perolehan, $sumber, $keterangan);
    $stmt->execute();

    if ($stmt) {
        header("Location: /inventori/barang/list?status=success");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
<div class="mb-4 w-full mx-auto bg-slate-600">
    <div class="w-full">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate autem recusandae earum rerum inventore omnis laudantium pariatur ducimus cum expedita eveniet suscipit, quibusdam accusantium exercitationem quisquam. Corporis maxime dolorum magni.</p>
    </div>

</div>

<section class="mb-4 w-full mx-auto">
    <div class="bg-white rounded-md p-4 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-700 mb-3">➕ Tambah Barang</h2>

        <form class="space-y-3" action="" method="POST">

            <!-- Jenis Barang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Jenis Barang</label>
                <select id="jenis_barang" name="jenis_barang"
                    class="w-full rounded-sm px-3 py-2 border border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <?php while ($row_barang_jenis = mysqli_fetch_assoc($result_barang_jenis)) : ?>
                        <option value="<?php echo $row_barang_jenis['id_barang_jenis']; ?>">
                            <?php echo $row_barang_jenis['nama_barang_jenis']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Kode Barang (Readonly, auto generate) -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Kode Barang</label>
                <input type="text" id="kode_barang" name="kode" readonly
                    class="w-full bg-gray-100 rounded-sm border border-gray-200 text-sm px-3 py-2" />
            </div>

            <!-- Nama Barang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Barang</label>
                <input type="text" name="nama_barang"
                    class="w-full rounded-sm border border-gray-200 text-sm focus:border  focus:border-orange-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Spesifikasi</label>
                <div x-data="{ specs: [{label:'', value:''}] }">

                    <template x-for="(spec, i) in specs" :key="i">
                        <div class="flex gap-2 mb-2">
                            <input type="text" x-model="spec.label" placeholder="Label"
                                class="w-full rounded-md border border-gray-200 text-sm focus:border  focus:border-orange-500 px-3 py-2 focus:ring-indigo-500">

                            <input type="text" x-model="spec.value" placeholder="Nilai"
                                class="w-full rounded-md border border-gray-200 text-sm focus:border  focus:border-orange-500 px-3 py-2 focus:ring-indigo-500">

                            <button type="button"
                                @click="specs.splice(i,1)"
                                class="px-4 text-sm py-2 bg-red-500 text-white rounded-md">X</button>
                        </div>
                    </template>

                    <button type="button"
                        @click="specs.push({label:'', value:''})"
                        class="px-3 py-1 bg-blue-600 text-white rounded text-sm">
                        + Tambah Spesifikasi
                    </button>

                    <!-- Hidden input untuk mengirim JSON -->
                    <textarea name="spesifikasi" x-model="JSON.stringify(specs)" class="hidden"></textarea>
                </div>
            </div>

            <!-- Kondisi Barang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Kondisi Barang</label>
                <select name="kondisi" class="w-full rounded-sm px-3 py-2 border border-gray-200 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>

            <!-- Ruangan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Ruangan</label>
                <select name="ruangan" class="w-full rounded-sm px-3 py-2 border border-gray-200 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <?php while ($row = mysqli_fetch_assoc($result_ruangan)) : ?>
                        <option value="<?php echo $row['id_ruangan']; ?>"><?php echo $row['nama_ruangan']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Tahun Perolehan -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Tahun Perolehan</label>
                <input type="text" name="tahun_perolehan"
                    class="w-full rounded-sm border  border-gray-200 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <!-- Sumber -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Sumber</label>
                <input type="text" name="sumber"
                    class="w-full rounded-sm border  border-gray-200 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500" />
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Keterangan</label>
                <textarea name="keterangan" id="" class="w-full rounded-sm border  border-gray-200 text-sm focus:border-indigo-500 px-3 py-2 focus:ring-indigo-500"></textarea>
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
<script>
    document.getElementById("jenis_barang").addEventListener("change", function() {
        let idJenis = this.value;

        if (idJenis) {
            fetch(" /inventori/barang/kode/" + idJenis)
                .then(res => res.text())
                .then(data => {
                    document.getElementById("kode_barang").value = data;
                })
                .catch(err => console.error(err));
        }
    });
</script>