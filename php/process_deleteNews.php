<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM news WHERE id_news = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../admin.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>