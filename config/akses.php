<?php
session_start();

function cekLogin()
{
  if (!isset($_SESSION['user_id'])) {
    header("Location: /inventori/login");
    exit;
  }
}

function cekAkses($allowedRoles)
{
  $role = $_SESSION['peran'] ?? null;
  return in_array($role, $allowedRoles);
}

function ceksession()
{
  echo $_SESSION['user_id'];
  echo $_SESSION['nama'];
  echo $_SESSION['peran'];
  echo $_SESSION['jurusan_id'];
}
