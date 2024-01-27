<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama_pemilik = $_POST["nama_pemilik"];
    $nomor_plat = $_POST["nomor_plat"];
    $jenis_layanan = $_POST["jenis_layanan"];
    $alamat = $_POST["alamat"];

    // Insert data into table
    $sql = "INSERT INTO user (nama_pemilik, nomor_plat, jenis_layanan, alamat) 
            VALUES ('$nama_pemilik', '$nomor_plat', '$jenis_layanan', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran Servis Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
