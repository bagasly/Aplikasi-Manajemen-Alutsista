<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
  $weaponId = $_GET['id'];
  $sql = "DELETE FROM weapons WHERE serial_number = $weaponId";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../admin.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>