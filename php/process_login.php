<?php
// Koneksi ke database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari formulir login
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Persiapkan pernyataan SQL
  $sql = "SELECT id_user, username, password FROM users WHERE username = ?";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);

  // Eksekusi pernyataan SQL
  $stmt->execute();

  // Ambil hasil query
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Pengguna ditemukan, verifikasi kata sandi
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      // Kata sandi benar, berikan sesi atau tindakan selanjutnya
      session_start();
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      header("Location: ../index.html"); // Ganti dengan halaman setelah login
      exit();
    } else {
      echo "Kata sandi salah.";
    }
  } else {
    echo "Pengguna dengan username '$username' tidak ditemukan.";
  }

  // Tutup koneksi
  $stmt->close();
  $conn->close();
} else {
  // Jika bukan metode POST, redirect atau berikan pesan kesalahan
  header("Location: ../login.html");
  exit();
}
?>