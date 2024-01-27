<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        include "koneksiUAS.php";

        $query = "DELETE FROM user WHERE id_user='$id'";

        mysqli_query($koneksi, $query);
    }
?>

<script>
	alert('Pengguna telah berhasil dihapus');
	location='indexUAS.php?menu=pengguna';
</script>