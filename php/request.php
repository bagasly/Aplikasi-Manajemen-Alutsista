<?php
session_start();
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_user = $_POST["id_user"];
  $serial_number = $_POST["serial_number"];
  $reason = $_POST['reason'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];


  // Simpan permintaan ke database
  $sql = "INSERT INTO request (id_user, serial_number, reason, tgl_pinjam, tgl_kembali) VALUES ('$id_user', '$serial_number', '$reason', '$tgl_pinjam', '$tgl_kembali')";
  $result = $conn->query($sql);

  if ($result) {
    header("Location: ../index.php");
  } else {
    echo "Gagal mengajukan permintaan: " . $conn->error;
  }
}
?>