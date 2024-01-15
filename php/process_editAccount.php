<?php
require_once('koneksi.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve data from the form
  $id_user = $_POST['id_user'];
  $name = $_POST['name'];
  $grade = $_POST['grade'];
  $battalion = $_POST['battalion'];

  $sql = "UPDATE users SET name='$name', grade='$grade', battalion='$battalion' WHERE id_user='$id_user'";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../admin.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}
?>