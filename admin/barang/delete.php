<?php
	ob_start();	
	
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		$result=$db->query("SELECT * FROM tblbarang WHERE idbarang=$id");
		$row=$result->fetch_assoc();
		$db->close();
		
	} else {
		include ("../../config/koneksi.php");
			
			$id=$_GET['id'];
				
			$query="DELETE FROM tblbarang WHERE idbarang=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			$stmt->close();
			$db->close();
		
		
			header("Location: ../index.php?p=barang");
	
	}
	ob_end_flush();
?>
	
<html>
<body>
	<head>
		<link rel="stylesheet" href="css/barang.css"/>
	</head>
	<div id="barang_hapus">
		<h2>Hapus Data</h2>
		<p>Apakah Anda ingin Menghapus data ?</p><?php echo $row["namabarang"]?>
		<form action='barang/delete.php' method='get'>
			
			<input type='hidden' name='id' value='<?php echo $row["idbarang"]?>'/>
			</br>
			<input type='submit' name='btn' value='hapus'/>
		</form>
		<a href="?p=barang"><input type="image" src="images/back.jpg" width="40" height="40" style="margin-top:20px;"></input><a>
	</div>
</body>
</html>

	