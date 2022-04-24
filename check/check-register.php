<?php
session_start();

require_once __DIR__ . './../db-config.php';

// var_dump(isset($_POST['email']) && isset($_POST['password']));
// exit();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $name = validate($_POST['name']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if (empty($name)) { //! if "Name" empty, Redirect.
    header("Location: login.php?error=Nama wajib diisi!");
    exit();
  } else if (empty($email)) { //! if "Email" empty, Redirect.
    header("Location: login.php?error=Email wajib diisi!");
    exit();
  } else if (empty($password)) { //! if "Password" empty, Redirect.
    header("Location: login.php?error=Password wajib diisi!");
    exit();
  } else {
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $statement = $connection->prepare($sql);
    $newData = $statement->execute([$name, $email, $password]);

    //! Find Registered User
    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $statement = $connection->prepare($sql);
    $statement->execute([$email, $password]);

    // var_dump($newData);
    // exit();

    if ($row = $statement->fetch()) { //! if "find user query" success
      //! Create Session data by Logged In User
      $_SESSION['id'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];

      header("Location: ./../biodata.php"); //! Redirect to "Home Page"
      exit();
    } else {
      header("Location: login.php?error=Email atau Password tidak ditemukan!");
      exit();
    }
  }
} else {
  header("Location: register.php?");
  exit();
}
