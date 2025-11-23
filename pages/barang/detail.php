<?php $id = $_GET['id'] ?? null;

if (!$id) {
  header("Location: ../barang/list.php");
  exit;
} else {
  $query = "SELECT * FROM barang_inventaris WHERE kode_barang_inventaris = '$id'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
}
?>
<div class="mb-4 w-full mx-auto bg-slate-800 rounded-md text-gray-200">
  <div class="flex p-2 gap-2 w-full">
    <div class="w-1/2 border rounded-md">
      ffffwwwwwwwwwwwwwwwwwwwwwwwwwww
    </div>
    <div class="w-1/2">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate autem recusandae earum rerum inventore omnis laudantium pariatur ducimus cum expedita eveniet suscipit, quibusdam accusantium exercitationem quisquam. Corporis maxime dolorum magni.</p>
    </div>
  </div>


</div>