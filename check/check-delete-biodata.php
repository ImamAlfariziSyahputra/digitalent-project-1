<?php
// include database connection file
require_once __DIR__ . './../db-config.php';

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$sql = "DELETE FROM biodata WHERE id= ?";
$statement = $connection->prepare($sql);
$deletedUser = $statement->execute([$id]);

// var_dump($deletedUser);

// After delete redirect to Home, so that latest user list will be displayed.
if ($deletedUser == true) {
  $alert = <<<ALERT
      <script>
        alert('Delete Data Sucess!');
        window.location='./../biodata.php'
      </script>
    ALERT;

  echo $alert;
  exit();
} else {
  $alert = <<<ALERT
    <script>
      alert('Delete Data Gagal!');
      window.location='./../biodata.php'
    </script>
  ALERT;

  echo $alert;
  exit();
}

// header("Location: ./../home.php");
