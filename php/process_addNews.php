<?php
// Koneksi ke database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari formulir
  $id_news = $_POST["id_news"];
  $image_link = $_POST["image_link"];
  $title = $_POST["title"];
  $date = $_POST["date"];
  $source_link = $_POST["source_link"];

  // Persiapkan pernyataan SQL
  $sql = "INSERT INTO news (id_news, image, title, date, link) VALUES (?, ?, ?, ?, ?)";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $id_news, $image_link, $title, $date, $source_link);

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