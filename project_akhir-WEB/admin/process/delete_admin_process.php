<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if (isset($_POST['nomor_plat'])) {
    $nomor_plat = $_POST['nomor_plat'];

    // Delete data from table
    $sql = "DELETE FROM user WHERE nomor_plat = '$nomor_plat'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Hapus Data Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
