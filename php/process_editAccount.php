<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  // Ambil data pengguna berdasarkan ID dan isi formulir edit
  // Misalnya: $sql = "SELECT * FROM users WHERE id_user = $userId";
}

$conn->close();
?>