<?php
// Koneksi ke database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari formulir
  $serial_number = $_POST["serial_number"];
  $name = $_POST["name"];
  $size = $_POST["size"];
  $weight = $_POST["weight"];
  $status = $_POST["status"];
  $location = $_POST["location"];
  $type = $_POST["type"];
  $capacity = $_POST["capacity"];
  $fire_power = $_POST["fire_power"];
  $owner = $_POST["owner"];
  $maintance = $_POST["maintance"]; // Perbaikan pada nama variabel maintenance
  $history = $_POST["history"];
  $materials = $_POST["materials"];
  $speed = $_POST["speed"];

  // Menghandle file gambar
  $image = $_FILES["image"]["name"];
  $target_dir = "../uploads/";  // Folder tempat menyimpan file gambar
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // ... (Your existing image upload checks)

  // Persiapkan pernyataan SQL
  $sql = "UPDATE weapons SET name=?, size=?, weight=?, status=?, location=?, type=?, capacity=?, fire_power=?, owner=?, maintance=?, history=?, materials=?, speed=?, image=? WHERE serial_number=?";

  // Gunakan prepared statement untuk menghindari SQL injection
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssssssssss", $name, $size, $weight, $status, $location, $type, $capacity, $fire_power, $owner, $maintance, $history, $materials, $speed, $image, $serial_number);

  // Eksekusi pernyataan SQL
  if ($stmt->execute()) {
    // Redirect to admin.php after successful update
    header("Location: ../admin.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
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