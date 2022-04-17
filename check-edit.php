<?php
session_start();

require_once __DIR__ . '/db-config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$gender = $_POST['gender'];
$umur = $_POST['umur'];

// var_dump(
//   $id,
//   $nama,
//   $alamat,
//   $tempat_lahir,
//   $gender,
//   $umur
// );
// exit;

$result = mysqli_query($conn, "UPDATE biodata SET nama='$nama',alamat='$alamat',tempat_lahir='$tempat_lahir',gender='$gender',umur='$umur' WHERE id='$id'");

// var_dump($result);
// exit;

if ($result === true) {
  header("Location: home.php"); //! Redirect to "Home Page"
  exit();
} else {
  echo "Tambah Data Gagal!";
}
