<?php
	ob_start();	
	
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		$result=$db->query("SELECT * FROM tbljenis WHERE idjenis=$id");
		$row=$result->fetch_assoc();
		$db->close();
		
	} else {
		include ("../../config/koneksi.php");
			
			$id=$_GET['id'];
				
			$query="DELETE FROM tbljenis WHERE idjenis=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			$stmt->close();
			$db->close();
		
		
			header("Location: ../index.php?p=jenis");
	
	}
	ob_end_flush();
?>
	
<html>
<body>
	<head>
		<link rel="stylesheet" href="css/jenis.css"/>
	</head>
	<div id="jenis_hapus">
		<h2>Hapus Data</h2>
		<p>Apakah Anda ingin Menghapus data ?</p><?php echo $row["jenis"]?>
		<form action='jenis/delete.php' method='get'>
			
			<input type='hidden' name='id' value='<?php echo $row["idjenis"]?>'/>
			</br>
			<input type='submit' name='btn' value='Hapus'/>
		</form>
		<a href="?p=jenis"><input type="image" src="images/back.jpg" width="40" height="40" style="margin-top:20px;"></input><a>
	</div>
</body>
</html>

	