<?php 
session_start();
session_destroy();
?>

<script>
    alert('Logout berhasil');
    location='indexUAS.php';
</script>