<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil nilai username dan password dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = new mysqli("localhost", "root", "", "service_database");

  $query = "SELECT username, password FROM admin_perusahaan WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header('Location: ../homeAdmin.php');
    exit();
  } else {
    header('Location: ../index.php?error=1');
    exit();
  }
} else {
  header('Location: ../index.php');
  exit();
}