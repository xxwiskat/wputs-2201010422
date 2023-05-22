<?php
    require('../supp/koneksi.php');

    // Tambah Data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $gender = $_POST['gender'];

        //Menambah Data Baru
        $query = "INSERT INTO data_mahasiswa(
                nama, 
                jenis_kelamin, 
                nim, 
                jurusan
                )
                VALUES(
                '$nama', 
                '$gender', 
                '$nim', 
                '$jurusan'
                )";

        if(mysqli_query($mysqli, $query)) {
          $_SESSION['alert'] = 'tambah';

          header("Location: ../dashboard.php");
          exit;
        }
        else{
          echo "Error create data record: " . mysqli_error($conn);
        }

        mysqli_close($mysqli);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD | ADD DATA MAHASISWA</title>

    <!-- link font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- link icon -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!-- link css -->
    <link rel="stylesheet" href="../css/style_add.css" />

    <style></style>
  </head>
  <body>
    <!-- Navbar -->
    <nav>
      <div class="brand">
        <span><a href="">DASHBOARD</a></span>
      </div>
      <div class="navbar">
        <ul>
          <li><a href="">Data Matakuliah</a></li>
          <li><a href="">Data Dosen</a></li>
          <li>
            <a href="../dashboard.php" class="selected-navbar bar-bottom"
              >Data Mahasiswa</a
            >
          </li>
          <li><a href="">Data User</a></li>
        </ul>
      </div>
    </nav>

    <!-- main -->
    <main>
      <div class="title-main">
        <span>ADD DATA MAHASISWA</span>
      </div>

      <div class="body-main">
        <form action="" method="POST">
          <div class="form-input">
            <input type="text" name="nama" id="nama" required="required" />
            <span>Name</span>
          </div>
          <div class="form-input select-input">
            <div class="testing">
              <select name="gender" id="gender">
                <option selected hidden>JENIS KELAMIN</option>
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <div class="icon-select">
                <i class="ri-arrow-down-s-fill"></i>
              </div>
            </div>
          </div>
          <div class="form-input">
            <input type="text" name="nim" id="nim" required="required" />
            <span>NIM</span>
          </div>
          <div class="form-input select-input">
            <select name="jurusan" id="jurusan">
              <option selected hidden>PILIH JURUSAN</option>
              <option value="Hukum">Hukum</option>
              <option value="Manajemen">Manajemen</option>
              <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
              <option value="Kedokteran">Kedokteran</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Ilmu Politik">Ilmu Politik</option>
            </select>
            <div class="icon-select">
              <i class="ri-arrow-down-s-fill"></i>
            </div>
          </div>
          <div class="form-input">
            <a href="../dashboard.php">CANCEL</a>
            <button type="submit">ADD DATA</button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
