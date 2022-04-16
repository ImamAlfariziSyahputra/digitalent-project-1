<?php
session_start();

require_once __DIR__ . '/db-config.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$gender = $_POST['gender'];
$umur = $_POST['umur'];

// var_dump(
//   $nama,
//   $alamat,
//   $tempat_lahir,
//   $gender,
//   $umur
// );

$result = mysqli_query($conn, "INSERT INTO biodata(nama,alamat,tempat_lahir,gender,umur) VALUES('$nama','$alamat','$tempat_lahir','$gender','$umur')");

var_dump($result);

if ($result === true) {
  header("Location: home.php"); //! Redirect to "Home Page"
  exit();
} else {
  echo "Tambah Data Gagal!";
}
