<?php
// Mulai sesi
session_start();

// Pemeriksaan apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.html");
  exit();
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$grade = isset($_SESSION['grade']) ? $_SESSION['grade'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="css/global.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .profile-image {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
      background-color: #e0e0e0;
      /* Warna latar belakang sebagai placeholder */
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .profile-image-placeholder {
      font-size: 24px;
      color: #757575;
    }

    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .profile-info {
      text-align: left;
    }
  </style>
</head>

<body style="background-color: #134a6e">
  <?php
  // Sambungkan ke database
  require_once('./php/koneksi.php');

  // Ambil username dari sesi
  $username = $_SESSION['username'];

  // Persiapkan pernyataan SQL
  $sql = "SELECT name, grade, role FROM users WHERE username = ?";

  // Persiapkan pernyataan SQL menggunakan prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);

  // Eksekusi pernyataan SQL
  $stmt->execute();

  // Ambil hasil query
  $result = $stmt->get_result();

  // Ambil data pengguna
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $grade = $row['grade'];
    $role = $row['role'];
  }

  // Tutup koneksi
  $stmt->close();
  $conn->close();

  ?>

  <div class="container-fluid w-50 text-center d-grid bg-white p-5" style="margin: 10% auto; border-radius: 10px">
    <div class="profile-image">
      <div class="profile-image-placeholder">
        <input type="file" class="form-control" id="floatingInput" name="foto" />
        <!-- Tambahkan atribut "accept" untuk membatasi tipe file yang dapat diunggah -->
      </div>
    </div>
    <form action="" method="post">
      <div class="profile-info">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="name" value="<?php echo $name; ?>"
            readonly />
          <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingPassword" name="grade" value="<?php echo $grade; ?>"
            readonly />
          <label for="floatingPassword">Grade</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingPassword" name="role" value="<?php echo $role; ?>"
            readonly />
          <label for="floatingPassword">Role</label>
        </div>
      </div>
    </form>
  </div>
</body>

</html>