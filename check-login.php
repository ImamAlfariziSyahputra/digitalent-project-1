<?php
session_start();

require_once __DIR__ . '/db-config.php';

// var_dump(isset($_POST['email']) && isset($_POST['password']));
// exit();

if (isset($_POST['email']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if (empty($email)) { //! if "Email" empty, Redirect.
    header("Location: login.php?error=Email wajib diisi!");
    exit();
  } else if (empty($password)) { //! if "Password" empty, Redirect.
    header("Location: login.php?error=Password wajib diisi!");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) { //! if "find user query" success
      $row = mysqli_fetch_assoc($result); //! return data from db

      //! Double Check Email and Password
      if ($row['email'] === $email && $row['password'] === $password) {
        //* User Logged In SUCCESS
        //! Create Session data by Logged In User
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];

        header("Location: home.php"); //! Redirect to "Home Page"
        exit();
      } else {
        header("Location: login.php?error=Email atau Password tidak ditemukan!");
        exit();
      }
    } else {
      header("Location: login.php?error=Email atau Password tidak ditemukan!");
      exit();
    }
  }
} else {
  header("Location: login.php?");
  exit();
}
