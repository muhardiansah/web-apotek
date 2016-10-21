<?php
	ob_start();	
	
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		$result=$db->query("SELECT * FROM tblvendor WHERE idvendor=$id");
		$row=$result->fetch_assoc();
		$db->close();
		
	} else {
		include ("../../config/koneksi.php");
			
			$id=$_GET['id'];
				
			$query="DELETE FROM tblvendor WHERE idvendor=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			$stmt->close();
			$db->close();
		
		
			header("Location: ../index.php?p=vendor");
	
	}
	ob_end_flush();
?>
	
<html>
<body>
	<head>
		<link rel="stylesheet" href="css/vendor.css"/>
	</head>
	<div id="vendor_hapus">
		<h2>Hapus Data</h2>
		<p>Apakah Anda akan Menghapus data ?</p><?php echo $row["vendor"]?>
		<form action='vendor/delete.php' method='get'>
			
			<input type='hidden' name='id' value='<?php echo $row["idvendor"]?>'/>
			</br>
			<input id="tekan" type='submit' name='btn' value='Hapus'/>
		</form>
		<a href="?p=vendor"><input type="image" src="images/back.jpg" width="40" height="40" style="margin-top:20px;"></input></a>
	</div>
</body>
</html>

	