<?php
$routes = [
  "dashboard" => ["admin", "kepala_lab", "kakom", "wakasek_sarpras", "kepala_sekolah"],

  "user/list" => ["admin"],
  "user/add" => ["admin"],
  "user/edit" => ["admin"],
  "user/delete" => ["admin"],

  "menu" => ["admin"],

  "barang/add" => ["admin", "kepala_lab"],
  "barang/list" => ["admin", "kepala_lab"],
  "barang/detail" => ["admin", "kepala_lab"],
  "barang/edit" => ["admin", "kepala_lab"],
  "barang/delete" => ["admin", "kepala_lab"],
  "barang/kode" => ["admin", "kepala_lab"],

  "jurusan/add" => ["admin"],
  "jurusan/list" => ["admin"],
  "jurusan/edit" => ["admin"],
  "jurusan/delete" => ["admin"],

  "ruangan/add" => ["admin"],
  "ruangan/list" => ["admin"],
  "ruangan/edit" => ["admin"],
  "ruangan/delete" => ["admin"],

  "peminjaman/list" => ["kepala_lab", "kakom", "wakasek_sarpras", "kepala_sekolah", "admin"],

  "pengajuan/index" => ["kepala_lab", "kakom", "wakasek_sarpras", "kepala_sekolah"],
  "pembelian/index" => ["wakasek_sarpras", "kepala_sekolah"],

  "pengguna/index" => ["kepala_sekolah"],
  "jurusan/index" => ["kepala_sekolah"],

  "dashboard" => ["kepala_lab", "kakom", "wakasek_sarpras", "kepala_sekolah", "admin"],
];
