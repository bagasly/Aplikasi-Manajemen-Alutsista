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

  // Check apakah file gambar benar-benar gambar
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File bukan gambar.";
    $uploadOk = 0;
  }

  // Check jika file sudah ada
  if (file_exists($target_file)) {
    echo "Maaf, file gambar sudah ada.";
    $uploadOk = 0;
  }

  // Check ukuran file gambar
  if ($_FILES["image"]["size"] > 500000) {
    echo "Maaf, ukuran file gambar terlalu besar.";
    $uploadOk = 0;
  }

  // Check tipe file gambar yang diizinkan
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Maaf, hanya file gambar JPG, JPEG, PNG, dan GIF yang diizinkan.";
    $uploadOk = 0;
  }

  // Check jika $uploadOk bernilai 0
  if ($uploadOk == 0) {
    echo "Maaf, file gambar tidak diunggah.";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "File gambar " . basename($_FILES["image"]["name"]) . " telah diunggah.";

      // Pemeriksaan tambahan sebelum memanggil getimagesize
      if (!empty($target_file) && file_exists($target_file)) {
        $check = getimagesize($target_file);

        if ($check !== false) {
          // Lanjutkan dengan pernyataan SQL
          // ...
        } else {
          echo "File bukan gambar.";
        }
      } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file gambar.";
      }
    } else {
      echo "Maaf, terjadi kesalahan saat menyimpan file gambar.";
    }
  }

  // Persiapkan pernyataan SQL
  $sql = "INSERT INTO weapons (serial_number, name, size, weight, status, location, type, capacity, fire_power, owner, maintance, history, materials, speed, image) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssssssssss", $serial_number, $name, $size, $weight, $status, $location, $type, $capacity, $fire_power, $owner, $maintance, $history, $materials, $speed, $image);


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