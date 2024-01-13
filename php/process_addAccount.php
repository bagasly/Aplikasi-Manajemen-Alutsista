<?php
// Koneksi ke database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari formulir
  $name = $_POST["name"];
  $username = $_POST["username"];
  $battalion = $_POST["battalion"];
  $grade = $_POST["grade"];
  $role = $_POST["role"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Enkripsi password

  // Persiapkan pernyataan SQL
  $sql = "INSERT INTO users (name, username, battalion, grade, password, role) VALUES (?, ?, ?, ?, ?, ?)";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $name, $username, $battalion, $grade, $password, $role);

  // Eksekusi pernyataan SQL
  if ($stmt->execute()) {
    header("Location: ../admin.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
  }

  // Tutup koneksi
  $stmt->close();
  $conn->close();
} else {
  // Jika bukan metode POST, redirect atau berikan pesan kesalahan
  header("Location:../admin.php");
  exit();
}
?>