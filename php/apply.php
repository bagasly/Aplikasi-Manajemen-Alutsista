<?php
session_start();
require_once('koneksi.php');

// Saat admin memberikan persetujuan atau menolak permintaan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_action'])) {
  $request_id = $_POST['request_id'];
  $admin_action = $_POST['admin_action'];

  // Perbarui status permintaan berdasarkan tindakan admin
  $sql_update = "UPDATE request SET status = '$admin_action' WHERE id = $request_id";
  $result_update = $conn->query($sql_update);

  if ($result_update) {
    echo "Status permintaan berhasil diperbarui.";
  } else {
    echo "Gagal memperbarui status permintaan: " . $conn->error;
  }
}
?>