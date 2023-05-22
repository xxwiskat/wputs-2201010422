<?php
    require_once('../supp/koneksi.php');

    // Update Data
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nim= $_POST['nim'];
        $gender = $_POST['gender'];
        $jurusan = $_POST['jurusan'];

        // Update Data di Database
        $query = "DELETE FROM data_mahasiswa WHERE id = '$id'";

            if(mysqli_query($mysqli, $query)) {
                $_SESSION['alert'] = 'hapus';

                header("Location: ../dashboard.php");
                exit;
            }
            else{
            echo "Error deleting record: " . mysqli_error($conn);
            }
    }

    // Sisteam Read Data
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $sql = "SELECT * FROM data_mahasiswa WHERE id = '$id'";

    $result = mysqli_query($mysqli, $sql);

    // Cek Data
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    }
    else {
        echo "Data tidak ditemukan.";
        $data = [];
    }

    mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD | DELETE DATA MAHASISWA</title>

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
    <link rel="stylesheet" href="../css/style_delete.css" />

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
        <span>DELETE DATA MAHASISWA</span>
      </div>

      <div class="body-main">
      <form action="" method="POST">
          <input type="text" name="id" hidden value=" <?php echo $_GET['id'] ?> ">
          <div class="form-input">
            <input disabled type="text" name="nama" id="nama" required="required" value="<?= $data['nama'] ?>" />
          </div>
          <div class="form-input select-input">
            <div class="testing">
              <select disabled name="gender" id="gender">
                <option selected hidden>JENIS KELAMIN</option>
                <option value="Laki-Laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') { echo 'selected'; } ?> >Laki-Laki</option>
                <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') { echo 'selected'; } ?> >Perempuan</option>
              </select>
              <div class="icon-select">
                <i class="ri-arrow-down-s-fill"></i>
              </div>
            </div>
          </div>
          <div class="form-input">
            <input disabled type="text" name="nim" id="nim" required="required" value="<?= $data['nim'] ?>" />
          </div>
          <div class="form-input select-input">
            <select disabled name="jurusan" id="jurusan">
              <option selected hidden>PILIH JURUSAN</option>
              <option value="Hukum" <?php if ($data['jurusan'] == 'Hukum') { echo 'selected'; } ?> >Hukum</option>
              <option value="Manajemen" <?php if ($data['jurusan'] == 'Manajemen') { echo 'selected'; } ?> >Manajemen</option>
              <option value="Ilmu Komunikasi" <?php if ($data['jurusan'] == 'Ilmu Komunikasi') { echo 'selected'; } ?> >Ilmu Komunikasi</option>
              <option value="Kedokteran" <?php if ($data['jurusan'] == 'Kedokteran') { echo 'selected'; } ?> >Kedokteran</option>
              <option value="Teknik Sipil" <?php if ($data['jurusan'] == 'Teknik Sipil') { echo 'selected'; } ?> >Teknik Sipil</option>
              <option value="Ilmu Politik" <?php if ($data['jurusan'] == 'Ilmu Politik') { echo 'selected'; } ?> >Ilmu Politik</option>
            </select>
            <div class="icon-select">
              <i class="ri-arrow-down-s-fill"></i>
            </div>
          </div>
          <div class="form-input">
            <a href="../dashboard.php">CANCEL</a>
            <button type="submit">DELETE DATA</button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>