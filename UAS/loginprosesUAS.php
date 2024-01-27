<?php
	session_start();
	include "koneksiUAS.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$submit = $_POST['submit'];

	if($submit){
		$sql = "select * from user where username='$username' and password = '$password'";
		$query = mysqli_query($koneksi, $sql);
		$row = mysqli_fetch_array($query);
		
		if(md5($username) == md5($row['username']) AND md5($password) == md5($row['password'])){
 			$_SESSION['username']	= $row['username'];
 			$_SESSION['nama']		= $row['nama'];
 			$_SESSION['status']		= $row['status'];
 			$_SESSION['login']		= 1;
			
			$pesan = "Login berhasil, Selamat datang $username";
			} else {
				$pesan = "Login gagal, username atau password anda salah!";
			}
	}
?>
<script>
	alert('<?php echo $pesan; ?>');
	location='indexUAS.php';
</script>