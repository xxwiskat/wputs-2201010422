<?php
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'mahasiswa';
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS);

    if($mysqli->connect_error){
        die("Koneksi Gagal: " . $mysqli->connect_error);
    };

    // Membuat DATABASE
    $sql = "CREATE DATABASE IF NOT EXISTS mahasiswa";
    if(mysqli_query($mysqli, $sql)){
        echo "<h3>Database Berhasil Dibuat!</h3>";
    } 
    else{
        echo "<h3>Database Gagal Dibuat!</h3>".mysqli_error($mysqli);
    };


    require_once('koneksi.php');
    // Mengkoneksikan Database Yang Berhasil Dibuat!
    mysqli_select_db($mysqli, "mahasiswa");

    // Membuat Tabel
    $sql = "CREATE TABLE IF NOT EXISTS data_mahasiswa(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        nama VARCHAR(255),
        jenis_kelamin VARCHAR(255),
        nim VARCHAR(10),
        jurusan varchar(255)
    )";

    if (mysqli_query($mysqli, $sql)) {
        echo "<h3>Tabel Berhasil Dibuat!</h3>";
    }
    else{
        echo "<h3>Tabel Gagal Dibuat!</h3>" . mysqli_error($mysqli);
    };


    // Menutup Koneksi Ke MYSQL
    mysqli_close($mysqli);
?>