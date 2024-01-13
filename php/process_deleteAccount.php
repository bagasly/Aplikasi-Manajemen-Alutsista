<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  $sql = "DELETE FROM users WHERE id_user = $userId";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../admin.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>