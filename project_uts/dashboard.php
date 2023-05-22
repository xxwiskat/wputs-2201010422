<?php
    require_once('supp/koneksi.php');

    // Allert
    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'hapus') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Delete!','Data Berhasil Di Delete!','info')</script>";    
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'update') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Update!','Data Berhasil Di Update!','success')</script>";
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'tambah') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Tambah Data!','Data Mahasiswa Berhasil Di Tambahkan!','success')</script>";
    }

    // Read Data
    function read_data()
    {
        global $mysqli;

        $query = "SELECT * FROM data_mahasiswa";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }

    $data_tabel = read_data();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD</title>

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
    <link rel="stylesheet" href="css/style_index.css" />
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
            <a href="" class="selected-navbar bar-bottom">Data Mahasiswa</a>
          </li>
          <li><a href="">Data User</a></li>
        </ul>
      </div>
    </nav>

    <!-- main -->
    <main>
      <div class="title-main">
        <span>DATA MAHASISWA</span>
      </div>
      <div class="body-main">
        <a href="kelola_data/add.php">
          <div class="main">
            <i class="ri-user-add-fill"></i>
            <span class="add-data">ADD DATA</span>
          </div>
        </a>
      </div>
      <div class="table-main">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>NIM</th>
              <th>Jurusan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n= 1; ?>
            <?php
              for ($i = 0; $i < count($data_tabel); $i++) {
            ?>
              <tr class="content-table">
                <td><?= $n ?></td>
                <td><?php echo $data_tabel[$i]['nama'] ?></td>
                <td><?php echo $data_tabel[$i]['jenis_kelamin'] ?></td>
                <td><?php echo $data_tabel[$i]['nim'] ?></td>
                <td><?php echo $data_tabel[$i]['jurusan'] ?></td>
                <td>
                  <a href="kelola_data/edit.php?id=<?= $data_tabel[$i]['id']; ?>" class="btn btn-edit"><i class="ri-pencil-fill"></i></a>
                  <a href="kelola_data/delete.php?id=<?= $data_tabel[$i]['id']; ?>" class="btn btn-del"><i class="ri-delete-bin-5-fill"></i></a>
                </td>
              </tr>
              <?php $n++; ?>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </body>
</html>
<?php 
    $_SESSION['alert'] = ' '; 
?>