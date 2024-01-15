<?php
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION["id_user"])) {
  // Hapus semua variabel session
  session_unset();

  // Hancurkan session
  session_destroy();

  // Redirect ke halaman login atau halaman lain yang sesuai
  header("Location: ../login.html");
  exit();
} else {
  // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
  header("Location: ../login.html");
  exit();
}
?>