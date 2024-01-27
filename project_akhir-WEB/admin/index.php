<?php
    $conn = mysqli_connect('localhost','root','','service_database');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" />  
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-6">
        <div class="login-container">
          <h1>HARYANTO COMPANY | ADMIN</h1>
          <hr>
          <form action="./process/login_process.php" method="POST">
            <div class="form-group">
              <label for="username"><i class="bi bi-person-fill"></i> Username</label>
              <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
              <label for="password"><i class="bi bi-lock-fill"></i> Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <center>
                <button type="submit" class="btn">Login</button>
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- /Bootstrap JS -->
</body>

</html>