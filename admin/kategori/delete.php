<?php
	ob_start();
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		$result=$db->query("SELECT * FROM tblkategori WHERE idkategori=$id");
		$row=$result->fetch_assoc();
		$db->close();
	} else {
		include ("../../config/koneksi.php");
			
			$id=$_GET['id'];
			
			$query="DELETE FROM tblkategori WHERE idkategori=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			$stmt->close();
			$db->close();
			
			header("Location: ../index.php?p=kategori");
			
	}
	ob_end_flush();
?>
<html>
<head>
	<link rel="stylesheet" href="css/kategori.css"/>
</head>
<body>
	<div id="kategori_hapus">
		<h2>Hapus Data</h2>
		<p>Apakah Anda Ingin Menghapus Data ini?</p><?php echo $row["kategori"]?>
		<form action='kategori/delete.php' method='get'>
			
			<input type='hidden' name='id' value='<?php echo $row["idkategori"]?>'/>
			</br>
			<input type='submit' name='btn' value='Hapus' />
		</form>
		<a href="?p=kategori"><input type="image" src="images/back.jpg" width="40" height="40" style="margin-top:20px;"></input><a>
	</div>
</body>
</html>