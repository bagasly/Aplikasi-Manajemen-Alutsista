<?php
session_start();
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_request = $_POST["id_request"];
  $admin_action = ($_POST["admin_action"] == "accept") ? 0 : 1;

  // Simpan ke database atau lakukan operasi sesuai kebutuhan
  $sqlUpdateStatus = "UPDATE request SET opsi = '$admin_action' WHERE id_request = '$id_request'";

  if ($conn->query($sqlUpdateStatus) === TRUE) {
    // Berhasil memperbarui status
    header("Location: ../index.php");
  } else {
    // Gagal memperbarui status
    echo "Error updating status: " . $conn->error;
  }
}
?>