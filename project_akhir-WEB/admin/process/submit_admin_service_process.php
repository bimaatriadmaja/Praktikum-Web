<?php
$conn = mysqli_connect("localhost", "root", "", "service_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id_service = $_POST["id_service"];
    $service = $_POST["service"];;
    $status = $_POST["status"];
    $harga = $_POST["harga"];

    // Insert data into table
    $sql = "INSERT INTO transaksi (id_service, service, status, ) 
            VALUES ('$id_service', '$service', '$status', '$harga')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran Servis Berhasil');window.location='../homeAdmin.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
