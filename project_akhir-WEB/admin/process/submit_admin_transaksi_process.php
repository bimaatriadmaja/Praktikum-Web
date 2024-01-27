<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id_transaksi = $_POST["id_transaksi"];
    $user_nomor_plat = $_POST["user_nomor_plat"];
    $tanggal = $_POST["tanggal"];
    $keterangan = $_POST["keterangan"];
    $status = $_POST["status"];

    // Insert data into table
    $sql = "INSERT INTO transaksi (id_transaksi, user_nomor_plat, tanggal, keterangan, status) 
            VALUES ('$id_transaksi', '$user_nomor_plat', '$tanggal', '$keterangan', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran Transaksi Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
