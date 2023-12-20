<?php
// Koneksi ke database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari formulir
  $name = $_POST["name"];
  $username = $_POST["username"];
  $battalion = $_POST["battalion"]; // Sesuaikan dengan nama input pada formulir
  $grade = $_POST["grade"]; // Sesuaikan dengan nama input pada formulir
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Enkripsi password

  // Persiapkan pernyataan SQL
  $sql = "INSERT INTO users (name, username, battalion, grade, password) VALUES (?, ?, ?, ?, ?)";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $name, $username, $battalion, $grade, $password);

  // Eksekusi pernyataan SQL
  if ($stmt->execute()) {
    echo "Pendaftaran berhasil!";
  } else {
    echo "Error: " . $sql . "<br>" . $stmt->error; // Perubahan disini dari $conn->error menjadi $stmt->error
  }

  // Tutup koneksi
  $stmt->close();
  $conn->close();
} else {
  // Jika bukan metode POST, redirect atau berikan pesan kesalahan
  header("Location: signup.html");
  exit();
}
?>