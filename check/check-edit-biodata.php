<?php
session_start();

require_once __DIR__ . './../db-config.php';

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

$sql = "UPDATE biodata SET nama = ?,alamat = ?,tempat_lahir = ?,gender = ?,umur = ? WHERE id = ?";
$statement = $connection->prepare($sql);
$updatedData = $statement->execute([$nama, $alamat, $tempat_lahir, $gender, $umur, $id]);

// var_dump($updatedData);
// exit;

if ($updatedData == true) {
  $alert = <<<ALERT
    <script>
      alert('Update Data Sucess!');
      window.location='./../biodata.php'
    </script>
  ALERT;

  echo $alert;
  exit();

  // header("Location: ./../home.php"); //! Redirect to "Home Page"
  // exit();
} else {
  $alert = <<<ALERT
    <script>
      alert('Edit Data Gagal!');
      window.location='./../edit.php?id=<?= $id ?>'
    </script>
  ALERT;

  echo $alert;
  exit();
}
