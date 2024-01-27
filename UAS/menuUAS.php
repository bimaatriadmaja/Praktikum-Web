<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            /* Awal Kode untuk Table User  */
            .table_user {
                border-top: 1px solid #ddd;
                color: transparent !important;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                font-size: 25px;
                padding: 20px 0px;
                width: 100%;
            }
            /* Awal Kode untuk Table Kamar */
            .table_kamar {
                border-top: 1px solid #ddd;
                color: transparent !important;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                font-size: 25px;
                padding: 20px 50px;
                width: 100%;
            }

            /* Awal Kode untuk Form Input User */
            .user_form input[type="text"],
            .user_form input[type="password"],
            .user_form select {
                width: 100%;
                color: #000;
                background-color: #fff;
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }
            .user_form input[type="submit"] {
                border-bottom: none;
                width: 100%;
                color: #fff;
                background-color: #6C5B7B;
                padding: 5px 10px;
                border-radius: 5px;
                border: none;
                cursor: pointer;
            }
            .user_form input[type="submit"]:hover {
                background-color: #F8B185 ,#6C5B7B;
            }
        </style>
    </head>

    <body>
        <header class="navbar-container">
            <nav class='nav-list'>
                <ul class='navbar-item'>
                    <li><a href="indexUAS.php?menu=pengguna">Data Base</a></li>
                    <li><a href="logoutUAS.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="jumbotron">
            <h2>Selamat Datang</h2>
            <p><?php echo $nama; ?></p>
        </div>

        <?php
            if (isset($_GET['menu'])) {
                $menu = $_GET['menu'];

                if ($menu == 'pengguna') {
                    //Menampilkan tabel user dari database
                    $query_user = "SELECT * FROM user";
                    $hasil_user = mysqli_query($koneksi, $query_user);
                    
                    echo "<div class='table_container'><h2>Tabel Informasi User</h2>";

                    if (mysqli_num_rows($hasil_user) > 0) {
                        echo "<table class='table_user'>";
                        echo "<tr><th>ID Pengguna</th><th>Username</th><th>Nama Pengguna</th><th>Password</th><th>Status Pengguna</th></tr>";
                        while ($row = mysqli_fetch_assoc($hasil_user)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table></div>";
                    } else {
                        echo "Tidak ada data transaksi.";
                    }

                    // Form Tambah Pengguna
                    echo "<div class='anti-jumbotron'>";
                    echo "<div class='card'>";
                    echo "<h2>Tambah Pengguna</h2>";
                    echo "<form class='user_form' action='tambahUAS.php' method='POST'>";
                    echo "<table>";
                    echo "<tr><td>Username</td><td><input type='text' name='username'></td></tr>";
                    echo "<tr><td>Nama</td><td><input type='text' name='nama'></td></tr>";
                    echo "<tr><td>Password</td><td><input type='password' name='password'></td></tr>";
                    echo "<tr><td>Jenis Pengguna</td><td>
                          <select name='jenis_pengguna'>
                              <option value='Administrator'>Administrator</option>
                          </select>
                      </td></tr>";
                    echo "<tr><td></td><td><input type='submit' value='Tambahkan'></td></tr>";
                    echo "</table>";
                    echo "</form>";
                    echo "</div>";
                
                    // Form Hapus Pengguna
                    echo "<div class='card'>";
                    echo "<h2>Hapus Pengguna</h2>";
                    echo "<form class='user_form' action='hapusUAS.php' method='POST'>";
                    echo "<table>";
                    echo "<tr><td>ID Pengguna</td><td><input type='text' name='id' ></td></tr>";
                    echo "<tr><td></td><td><input type='submit' value='Hapus'></td></tr>";
                    echo "</table>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    
                }
                    
            }
        ?>
    </body>
</html>