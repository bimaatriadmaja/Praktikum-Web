<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $jenis_pengguna = $_POST['jenis_pengguna'];

        include "koneksiUAS.php";
        
        $query = "INSERT INTO user (username, nama, password, status) VALUES ('$username', '$nama', '$password', '$jenis_pengguna')";
        
        mysqli_query($koneksi, $query);
    }
?>

<script>
	alert('Pengguna telah berhasil ditambahkan');
	location='indexUAS.php?menu=pengguna';
</script>