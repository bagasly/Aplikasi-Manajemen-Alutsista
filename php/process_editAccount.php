<?php
require_once('./php/koneksi.php');

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  $sql = "SELECT id_user, name, grade, battalion FROM users WHERE id_user = $userId";
  $result = $conn->query($sql);

  if ($result) {
    $userData = $result->fetch_assoc();
    echo json_encode($userData);
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
?>