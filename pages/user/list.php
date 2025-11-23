<?php
$query = "SELECT 
    pengguna.nama_lengkap, 
    pengguna.role, 
    jurusan.kode_jurusan
FROM pengguna
LEFT JOIN jurusan 
    ON pengguna.jurusan_id = jurusan.id_jurusan";
$result = mysqli_query($koneksi, $query);
$no = 1;
?>

<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
  echo '
    <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">Data berhasil disimpan!</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
            ✕
        </button>
    </div>
    ';
}
?>
<div class="mb-4 w-full mx-auto bg-slate-600">
  <div class="w-full">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate autem recusandae earum rerum inventore omnis laudantium pariatur ducimus cum expedita eveniet suscipit, quibusdam accusantium exercitationem quisquam. Corporis maxime dolorum magni.</p>
  </div>

</div>

<!-- Cards list -->
<section class="mb-4">
  <article class="bg-white rounded-md p-4 shadow-sm">
    <div class="flex items-start justify-between gap-3">
      <div>
        <h3 class="font-semibold">Tugas Terbaru</h3>
        <p class="text-sm text-gray-500">3 tugas belum selesai</p>
      </div>
      <div class="text-sm text-indigo-600 font-medium">Lihat</div>
    </div>
    <div class="mt-3 grid grid-cols-4 gap-3 text-xs">
      <div class="bg-gray-50 rounded-lg p-2">Pemrograman</div>
      <div class="bg-gray-50 rounded-lg p-2">Multimedia</div>
      <div class="bg-gray-50 rounded-lg p-2">Grafis</div>
      <div class="bg-gray-50 rounded-lg p-2">Grafis</div>
    </div>
  </article>
</section>

<section class="mb-4">
  <div class="rounded-md p-4 bg-gradient-to-r from-white to-gray-50 shadow-sm">
    <div class="flex items-center justify-between mb-3">
      <h2 class="text-lg font-semibold text-gray-700">Data Pengguna</h2>
      <a href="/inventori/user/add" class="px-3 py-1.5 bg-indigo-600 text-white rounded-sm text-sm shadow hover:bg-indigo-700">
        + Tambah
      </a>
    </div>

    <!-- Search -->
    <div class="mb-3">
      <input type="text" placeholder="Cari Pengguna..."
        class="w-full rounded-sm p-2 border border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-sm">
      <table class="w-full text-sm text-left text-gray-600">
        <thead class="bg-indigo-600 text-white text-xs uppercase">
          <tr>
            <th class="px-3 py-2">#</th>
            <th class="px-3 py-2">Nama Lengkap</th>
            <th class="px-3 py-2">Peran</th>
            <th class="px-3 py-2">Jurusan</th>
            <th class="px-3 py-2 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr class="hover:bg-gray-100 border-b border-gray-100 ">
              <td class="px-3 py-2 whitespace-nowrap"><?php echo $no++; ?></td>
              <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['nama_lengkap']; ?></td>
              <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['role']; ?></td>
              <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['kode_jurusan']; ?></td>
              <td class="px-3 py-2 text-center space-x-1 flex">
                <button class="px-2 py-1 bg-blue-500 text-white rounded text-xs hover:bg-blue-600">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                  </svg>
                </button>
                <button class="px-2 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                  </svg>
                </button>
              </td>
            </tr>
          <?php endwhile; ?>

        </tbody>
      </table>
    </div>
  </div>
</section>