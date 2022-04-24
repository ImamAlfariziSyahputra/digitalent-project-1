<?php
session_start();

require_once __DIR__ . './../db-config.php';

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

$sql = "INSERT INTO biodata(nama,alamat,tempat_lahir,gender,umur) VALUES( ? , ? , ? , ? , ? )";
$statement = $connection->prepare($sql);
$newData = $statement->execute([$nama, $alamat, $tempat_lahir, $gender, $umur]);

var_dump($newData);

if ($newData === true) {
  header("Location: ./../biodata.php"); //! Redirect to "Home Page"
  exit();
} else {
  echo "Tambah Data Gagal!";
}

if ($updatedData == true) {
  $alert = <<<ALERT
    <script>
      alert('Tambah Data Sucess!');
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
      alert('Tambah Data Gagal!');
      window.location='./../add.php'
    </script>
  ALERT;

  echo $alert;
  exit();
}
