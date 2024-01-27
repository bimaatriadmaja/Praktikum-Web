<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];;
    $posisi_karyawan = $_POST["posisi_karyawan"];
    $gaji_karyawan = $_POST["gaji_karyawan"];

    // Insert data into table
    $sql = "INSERT INTO karyawan (id_karyawan, nama_karyawan, posisi_karyawan, gaji_karyawan) 
            VALUES ('$id_karyawan', '$nama_karyawan', '$posisi_karyawan', '$gaji_karyawan')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran Karyawan Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
