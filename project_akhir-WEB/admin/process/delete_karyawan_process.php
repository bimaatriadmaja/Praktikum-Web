<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if (isset($_POST['id_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];

    // Delete data from table
    $sql = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Hapus Data Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
