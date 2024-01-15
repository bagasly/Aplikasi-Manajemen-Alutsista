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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ALUTSISTA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/global.css" />
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="card bg-transparent border-0 text-white">
      <img src="assets/logo.png" class="card-img-top" alt="" />
      <div class="card-body">
        <h3 class="card-title" style="padding-bottom: 10%">Menu</h3>
        <ul class="list-group nav nav-tabs" id="nav-tab" role="tablist">
          <li class="list-group-item">
            <button class="nav-link active" id="nav-news-tab" data-bs-toggle="tab" data-bs-target="#nav-news"
              type="button" role="tab" aria-controls="nav-news" aria-selected="true">
              <i class="fa-solid fa-table-list"></i>News
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-inventory-tab" data-bs-toggle="tab" data-bs-target="#nav-inventory"
              type="button" role="tab" aria-controls="nav-inventory" aria-selected="false">
              <i class="fa-solid fa-clipboard-list"></i>Inventory
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-apply-tab" data-bs-toggle="tab" data-bs-target="#nav-apply" type="button"
              role="tab" aria-controls="nav-apply" aria-selected="false">
              <i class="fa-solid fa-paper-plane"></i>Apply
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#nav-report" type="button"
              role="tab" aria-controls="nav-report" aria-selected="false">
              <i class="fa-solid fa-envelope-open"></i>Report
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account"
              type="button" role="tab" aria-controls="nav-account" aria-selected="false">
              <i class="fa-solid fa-user-plus"></i>Account
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
              type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
              <i class="fa-solid fa-user"></i>Profile
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content tab-content" id="nav-tabContent">
    <!-- News -->
    <div id="nav-news" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-news-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">News</a>
          <div class="d-flex me-3" onclick="showTabContent('nav-profile', 'nav-profile-tab')">
            <a class="text-white" style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                ">admin</a>
            <a><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"></i></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNews">
            <i class="fa-solid fa-plus" style="color: white"></i>
          </button>
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-bordered text-md-center" style="margin-top: 2%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Id</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Date</th>
              <th scope="col">Source</th>
              <th scope="col"><i class="fa-solid fa-info"></i></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            require_once('./php/koneksi.php');
            $sql = "SELECT id_news, image, title, date, link FROM news";
            $result = $conn->query($sql);

            if ($result) {
              $index = 1;
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?php echo $index; ?>
                  </td>
                  <td>
                    <?php echo $row['id_news']; ?>
                  </td>
                  <td>
                    <?php echo $row['image']; ?>
                  </td>
                  <td>
                    <?php echo $row['title']; ?>
                  </td>
                  <td>
                    <?php echo $row['date']; ?>
                  </td>
                  <td>
                    <?php echo $row['link']; ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editNews"
                      onclick="editNews(<?php echo $row['id_news']; ?>,
                      '<?php echo $row['image']; ?>',
                      '<?php echo $row['title']; ?>',
                      '<?php echo $row['date']; ?>',
                      '<?php echo $row['link']; ?>')">
                      Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger text-black"
                      onclick="deleteNews(<?php echo $row['id_news']; ?>)">
                      Delete
                    </button>
                  </td>
                </tr>
                <?php
                $index++;
              }
            } else {
              echo "Error: " . $conn->error;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Inventory -->
    <div id="nav-inventory" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-inventory-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Inventory</a>
          <div class="d-flex me-3" onclick="showTabContent('nav-profile', 'nav-profile-tab')">
            <a class="text-white" style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                ">admin</a>
            <a><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"></i></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInventory">
            <i class="fa-solid fa-plus" style="color: white"></i>
          </button>
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-bordered text-md-center" style="margin-top: 2%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Materials</th>
              <th scope="col">Status</th>
              <th scope="col">Location</th>
              <th scope="col"><i class="fa-solid fa-info"></i></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            require_once('./php/koneksi.php');
            $sql = "SELECT serial_number, name, materials, status, location FROM weapons";
            $result = $conn->query($sql);

            if ($result) {
              $index = 1;
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?php echo $index; ?>
                  </td>
                  <td>
                    <?php echo $row['serial_number']; ?>
                  </td>
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['materials']; ?>
                  </td>
                  <td>
                    <?php echo $row['status']; ?>
                  </td>
                  <td>
                    <?php echo $row['location']; ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-danger text-black"
                      onclick="deleteInventory(<?php echo $row['serial_number']; ?>)">
                      Delete
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                      data-bs-target="#editInventory" onclick="editInventory(<?php echo $row['serial_number']; ?>, 
                      '<?php echo $row['name']; ?>',
                      '<?php echo $row['materials']; ?>',
                      '<?php echo $row['status']; ?>',
                      '<?php echo $row['location']; ?>')">
                      Edit
                    </button>
                  </td>
                </tr>
                <?php
                $index++;
              }
            } else {
              echo "Error: " . $conn->error;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Apply -->
    <div id="nav-apply" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-apply-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Apply</a>
          <div class="d-flex me-3" onclick="showTabContent('nav-profile', 'nav-profile-tab')">
            <a class="text-white" style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                ">admin</a>
            <a><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"></i></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container-lg p-3 pt-4">
          <?php
          require_once('./php/koneksi.php');
          // Query untuk mengambil semua data request dan nama user
          $sql = "SELECT r.id_request, u.name, r.serial_number, r.reason
              FROM request r
              JOIN users u ON r.id_user = u.id_user";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $id_request = $row['id_request'];
              $nama = $row['name'];
              $serial_number = $row['serial_number'];
              $reason = $row['reason'];
              ?>
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">From
                    <?php echo $nama; ?>
                  </h5>
                  <form action="./php/process_apply.php" method="post">
                    <input type="hidden" name="id_request" value="<?php echo $id_request; ?>">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control border-3" id="floatingSerialNumber" name="serial_number"
                        placeholder="Serial Number" value="<?php echo $serial_number; ?>" disabled />
                      <label for="floatingSerialNumber">Serial Number</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea name="reason" class="form-control border-3" placeholder="Leave a reason here"
                        id="floatingTextareaDisabled" style="height: 100px" disabled><?php echo $reason; ?></textarea>
                      <label for="floatingTextareaDisabled">Reason</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admin_action" id="flexRadioDefault1"
                        value="decline" />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Decline
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admin_action" id="flexRadioDefault2" value="accept"
                        checked />
                      <label class="form-check-label" for="flexRadioDefault2">
                        Accept
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Send</button>
                  </form>
                </div>
              </div>
              <?php
            }
          } else {
            echo "Tidak ada data request yang ditemukan.";
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Report -->
    <div id="nav-report" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Report</a>
          <div class="d-flex me-3" onclick="showTabContent('nav-profile', 'nav-profile-tab')">
            <a class="text-white" style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                ">admin</a>
            <a><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"></i></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container-lg p-3 pt-4">
          <?php
          require_once('./php/koneksi.php');
          // Query untuk mengambil semua data request dan nama user
          $sql = "SELECT r.id_request, u.name, r.serial_number, r.reason
              FROM request r
              JOIN users u ON r.id_user = u.id_user";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $id_request = $row['id_request'];
              $nama = $row['name'];
              $serial_number = $row['serial_number'];
              $reason = $row['reason'];
              ?>
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">From
                    <?php echo $nama; ?>
                  </h5>
                  <form action="handle_request.php" method="post">
                    <input type="hidden" name="id_request" value="<?php echo $id_request; ?>">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control border-3" id="floatingSerialNumber" name="serial_number"
                        placeholder="Serial Number" value="<?php echo $serial_number; ?>" disabled />
                      <label for="floatingSerialNumber">Serial Number</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea name="reason" class="form-control border-3" placeholder="Leave a reason here"
                        id="floatingTextareaDisabled" style="height: 100px" disabled><?php echo $reason; ?></textarea>
                      <label for="floatingTextareaDisabled">Reason</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admin_action" id="flexRadioDefault1"
                        value="decline" />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Decline
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admin_action" id="flexRadioDefault2" value="accept"
                        checked />
                      <label class="form-check-label" for="flexRadioDefault2">
                        Accept
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Send</button>
                  </form>
                </div>
              </div>
              <?php
            }
          } else {
            echo "Tidak ada data request yang ditemukan.";
          }
          ?>
        </div>

      </div>
    </div>

    <!-- Account -->
    <div id="nav-account" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-account-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Account</a>
          <div class="d-flex me-3" onclick="showTabContent('nav-profile', 'nav-profile-tab')">
            <a class="text-white" style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                ">admin</a>
            <a><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"></i></a>
          </div>
        </div>
      </nav>
      <div class="card border-white bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAccount">
            <i class="fa-solid fa-plus" style="color: white"></i>
          </button>
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-bordered text-md-center" style="margin-top: 2%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Grade</th>
              <th scope="col">Battalion</th>
              <th scope="col"><i class="fa-solid fa-info"></i></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            require_once('./php/koneksi.php');
            $sql = "SELECT id_user, name, grade, battalion FROM users";
            $result = $conn->query($sql);

            if ($result) {
              $index = 1;
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?php echo $index; ?>
                  </td>
                  <td>
                    <?php echo $row['id_user']; ?>
                  </td>
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['grade']; ?>
                  </td>
                  <td>
                    <?php echo $row['battalion']; ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-danger text-black"
                      onclick="deleteAccount(<?php echo $row['id_user']; ?>)">
                      Delete
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                      data-bs-target="#editAccount" onclick="editAccount(<?php echo $row['id_user']; ?>,
                          '<?php echo $row['name']; ?>',
                          '<?php echo $row['grade']; ?>',
                          '<?php echo $row['battalion']; ?>')">
                      Edit
                    </button>
                  </td>
                </tr>
                <?php
                $index++;
              }
            } else {
              echo "Error: " . $conn->error;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Profile -->
    <div id="nav-profile" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Profile</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <?php
      // Sambungkan ke database
      require_once('./php/koneksi.php');

      // Ambil username dari sesi
      $username = $_SESSION['username'];

      // Persiapkan pernyataan SQL
      $sql = "SELECT name, grade, role FROM users WHERE username = ?";

      // Persiapkan pernyataan SQL menggunakan prepared statement
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $username); //Eksekusi pernyataan SQL 
      $stmt->execute(); // Ambil hasil query
      $result = $stmt->get_result(); // Ambil data pengguna 
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $grade = $row['grade'];
        $role = $row['role'];
      } // Tutup koneksi 
      $stmt->close();
      ?>
      <div class="container-fluid text-center d-grid" style="
            margin: 3%;
            width: 95%;
            border-radius: 10px;
            padding: 10%;
            background-color: #134a6e;
          ">
        <div class="profile-image">
          <div class="profile-image-placeholder">
            <input type="file" class="form-control" id="floatingInput" name="foto" />
            <!-- Tambahkan atribut "accept" untuk membatasi tipe file yang dapat diunggah -->
          </div>
        </div>
        <form action="" method="post">
          <div class="profile-info" style="padding: 2% 10% 0 10%">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="name" value="<?php echo $name; ?>"
                readonly />
              <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
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
    </div>

    <!-- Modal -->
    <!-- Account -->
    <!-- Add Account -->
    <form class="modal fade" id="addAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="addAccount" aria-hidden="true" action="./php/process_addAccount.php" method="post">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="username" class="form-control border-3" id="floatingUsername" placeholder="Username"
                name="username" />
              <label for="floatingId">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingName" placeholder="Name" name="name" />
              <label for="floatingName">Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingGrade" placeholder="Grade" name="grade" />
              <label for="floatingGrade">Grade</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingBattallion" placeholder="Battalion"
                name="battalion" />
              <label for="floatingBattallion">Battalion</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingRole" placeholder="role" name="role" />
              <label for="floatingRole">Role</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingPassword" placeholder="Password"
                name="password" />
              <label for="floatingPassword">Password</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Edit -->
    <form class="modal fade" id="editAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="editAccountLabel" aria-hidden="true" method="post" action="./php/process_editAccount.php">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="id" class="form-control border-3" name="id_user" id="floatingIdaccount" placeholder="Id"
                value="" />
              <label for="floatingIdaccount">Id</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" name="name" id="floatingNameaccount" placeholder="Name"
                value="" />
              <label for="floatingNameaccount">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" name="grade" id="floatingGradeaccount"
                placeholder="Grade" value="" />
              <label for="floatingGradeaccount">Grade</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" name="battalion" id="floatingBattallionaccount"
                placeholder="Battalion" value="" />
              <label for="floatingBattallionaccount">Battalion</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- News -->
    <!-- Add -->
    <form class="modal fade" id="addNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="addNews" aria-hidden="true" method="post" action="./php/process_addNews.php">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingId" name="id_news" placeholder="Id"
                value="" />
              <label for="floatingId">Id</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingImage" name="image_link" placeholder="Image"
                value="" />
              <label for="floatingImage">Image</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingTittle" name="title" placeholder="Title"
                value="" />
              <label for="floatingTittle">Title</label>
            </div>
            <div class="form-floating mb-3">
              <input type="date" class="form-control border-3" id="floatingDate" name="date" placeholder="Date"
                value="" />
              <label for="floatingDate">Date</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingSource" name="source_link"
                placeholder="Source" value="" />
              <label for="floatingSource">Source</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
        </div>
      </div>
    </form>


    <!-- Edit -->
    <div class="modal fade" id="editNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="editNews" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="id" class="form-control border-3" id="floatingIdnews" placeholder="Id" value="" />
              <label for="floatingIdnews">Id</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingImagenews" placeholder="Image" value="" />
              <label for="floatingImagenews">Image</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingTittlenews" placeholder="Tittle" value="" />
              <label for="floatingTittlenews">Tittle</label>
            </div>
            <div class="form-floating mb-3">
              <input type="date" class="form-control border-3" id="floatingDatenews" placeholder="Date" value="" />
              <label for="floatingDatenews">Date</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-3" id="floatingSourcenews" placeholder="Source" value="" />
              <label for="floatingSourcenews">Source</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">ADD</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Report -->
    <div class="modal fade" id="reportMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="reportMessage" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>From ...</p>
            <p>message</p>
            <div class="form-floating" style="margin-bottom: 5px">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
              <label for="floatingTextarea">Comments</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Inventory -->
    <!-- Add inventory -->
    <form class="modal fade" id="addInventory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="addInventory" aria-hidden="true" action="./php/process_addInventory.php" method="post"
      enctype="multipart/form-data">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container text-center w-100">
              <div class="row">
                <div class="col w-30">
                  <div>
                    <label for="formFileMultiple" class="form-label">Gambar</label>
                    <input class="form-control" type="file" name="image" id="image" multiple />
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="serial_number" type="id" class="form-control border-3" id="floatingSerialNumber"
                      placeholder="Serial Number" value="" />
                    <label for="floatingSerialNumber">Serial Number</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control border-3" id="floatingName" placeholder="Name"
                      value="" />
                    <label for="floatingName">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="type" type="text" class="form-control border-3" id="floatingType" placeholder="Type"
                      value="" />
                    <label for="floatingType">Type</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="capacity" type="text" class="form-control border-3" id="floatingCapacity"
                      placeholder="Capacity" value="" />
                    <label for="floatingCapacity">Capacity</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="size" type="text" class="form-control border-3" id="floatingSize" placeholder="Size"
                      value="" />
                    <label for="floatingSize">Size</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="weight" type="text" class="form-control border-3" id="floatingWeight"
                      placeholder="Weight" value="" />
                    <label for="floatingWeight">Weight</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="fire_power" type="text" class="form-control border-3" id="floatingFirepower"
                      placeholder="Fire Power" value="" />
                    <label for="floatingFirePower">Fire Power</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="speed" type="text" class="form-control border-3" id="floatingSpeed" placeholder="Speed"
                      value="" />
                    <label for="floatingSpeed">Speed</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="materials" type="text" class="form-control border-3" id="floatingMaterials"
                      placeholder="Materials" value="" />
                    <label for="floatingMaterials">Materials</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="status" type="text" class="form-control border-3" id="floatingStatus"
                      placeholder="Status" value="" />
                    <label for="floatingStatus">Status</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="owner" type="text" class="form-control border-3" id="floatingOwner" placeholder="Owner"
                      value="" />
                    <label for="floatingOwner">Owner</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="location" type="text" class="form-control border-3" id="floatingLocation"
                      placeholder="Location" value="" />
                    <label for="floatingLocation">Location</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="maintance" type="text" class="form-control border-3" id="floatingMaintance"
                      placeholder="Maintance" value="" />
                    <label for="floatingMaintance">Maintance</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="history" type="text" class="form-control border-3" id="floatingHistory"
                      placeholder="History" value="" />
                    <label for="floatingHistory">History</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Edit Inventory -->
    <form method="post" action="./php/process_editInventory.php" class="modal fade" id="editInventory"
      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInventory"
      aria-hidden="true" enctype="multipart/form-data">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container text-center w-100">
              <div class="row">
                <div class="col w-30">
                  <div>
                    <label for="formFileMultiple" class="form-label">Gambar</label>
                    <input class="form-control" type="file" name="image" id="image" multiple />
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="serial_number" type="id" class="form-control border-3"
                      id="floatingSerialNumberinventory" placeholder="Serial Number" value="" />
                    <label for="floatingSerialNumberinventory">Serial Number</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control border-3" id="floatingNameinventory"
                      placeholder="Name" value="" />
                    <label for="floatingNameinventory">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="type" type="text" class="form-control border-3" id="floatingType" placeholder="Type"
                      value="" />
                    <label for="floatingType">Type</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="capacity" type="text" class="form-control border-3" id="floatingCapacity"
                      placeholder="Capacity" value="" />
                    <label for="floatingCapacity">Capacity</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="size" type="text" class="form-control border-3" id="floatingSize" placeholder="Size"
                      value="" />
                    <label for="floatingSize">Size</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="weight" type="text" class="form-control border-3" id="floatingWeight"
                      placeholder="Weight" value="" />
                    <label for="floatingWeight">Weight</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="fire_power" type="text" class="form-control border-3" id="floatingFirepower"
                      placeholder="Fire Power" value="" />
                    <label for="floatingFirePower">Fire Power</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="speed" type="text" class="form-control border-3" id="floatingSpeed" placeholder="Speed"
                      value="" />
                    <label for="floatingSpeed">Speed</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="materials" type="text" class="form-control border-3" id="floatingMaterialsinventory"
                      placeholder="Materials" value="" />
                    <label for="floatingMaterialsinventory">Materials</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="status" type="text" class="form-control border-3" id="floatingStatusinventory"
                      placeholder="Status" value="" />
                    <label for="floatingStatusinventory">Status</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="owner" type="text" class="form-control border-3" id="floatingOwner" placeholder="Owner"
                      value="" />
                    <label for="floatingOwner">Owner</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="location" type="text" class="form-control border-3" id="floatingLocationinventory"
                      placeholder="Location" value="" />
                    <label for="floatingLocationinventory">Location</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="maintance" type="text" class="form-control border-3" id="floatingMaintance"
                      placeholder="Maintance" value="" />
                    <label for="floatingMaintance">Maintance</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="history" type="text" class="form-control border-3" id="floatingHistory"
                      placeholder="History" value="" />
                    <label for="floatingHistory">History</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/global.js"></script>
  <script>
    function deleteAccount(userId) {
      // Lakukan sesuatu dengan userId, misalnya, panggil fungsi untuk menghapus data
      window.location.href = './php/process_deleteAccount.php?id=' + userId;
    }

    function deleteInventory(weaponId) {
      // Lakukan sesuatu dengan userId, misalnya, panggil fungsi untuk menghapus data
      window.location.href = './php/process_deleteInventory.php?id=' + weaponId;
    }

    function deleteNews(newsId) {
      // Lakukan sesuatu dengan userId, misalnya, panggil fungsi untuk menghapus data
      window.location.href = './php/process_deleteNews.php?id=' + newsId;
    }

    function editInventory(serial_number, name, status, location, materials) {
      document.getElementById('floatingSerialNumberinventory').value = serial_number;
      document.getElementById('floatingNameinventory').value = name;
      document.getElementById('floatingMaterialsinventory').value = materials;
      document.getElementById('floatingStatusinventory').value = status;
      document.getElementById('floatingLocationinventory').value = location;
    }

    function editAccount(id_user, name, grade, battalion) {
      document.getElementById('floatingIdaccount').value = id_user;
      document.getElementById('floatingNameaccount').value = name;
      document.getElementById('floatingGradeaccount').value = grade;
      document.getElementById('floatingBattallionaccount').value = battalion;
    }

    function editNews(id_news, image, title, date, link) {
      document.getElementById('floatingIdnews').value = id_news;
      document.getElementById('floatingImagenews').value = image;
      document.getElementById('floatingTittlenews').value = title;
      document.getElementById('floatingDatenews').value = date;
      document.getElementById('floatingSourcenews').value = link;
    }
  </script>

</body>

</html>