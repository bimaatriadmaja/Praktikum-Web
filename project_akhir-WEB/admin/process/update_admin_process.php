<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama_pemilik = $_POST["nama_pemilik"];
    $nomor_plat = $_POST["nomor_plat"];
    $jenis_layanan = $_POST["jenis_layanan"];
    $alamat = $_POST["alamat"];

    // Insert data into table
    $sql = "UPDATE user SET nama_pemilik = '$nama_pemilik', nomor_plat = '$nomor_plat', jenis_layanan = '$jenis_layanan', alamat = '$alamat' WHERE nomor_plat = '$nomor_plat'";    

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update Data Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
