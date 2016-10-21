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
			$kategori=$_GET ['data'];
			$id=$_GET ['id'];
			
			$query="UPDATE tblkategori SET kategori=? WHERE idkategori=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('ss', $kategori,$id);
			$stmt->execute();
			$stmt->close();
			$db->close();
			
			header("Location: ../index.php?p=kategori");
			
	}
	ob_end_flush();
?>

<html>
<body>
	<head>
		<link rel="stylesheet" href="css/kategori.css"/>
	</head>
	<div id="container">
		<div class="kategori_insert">
			<h2 style="margin-left:160px;">Ubah Data</h2>
			<form action='kategori/update.php' method='get'>
				<fieldset action='kategori/update.php' method='get'>
					<dl>
						<dt><label>Kategori :</label></dt>
						<dd><input type='text' name='data' value='<?php echo $row["kategori"]?>'></input></dd>
						<dd><input type='hidden' name='id' value='<?php echo $row["idkategori"]?>'></input></dd>
					</dl>
					<dl class="submit">
						<button type='submit' name='btn' value='simpan'>Simpan</button>
					</dl>
					
				</fieldset>
					
			</form>	
				<a href="?p=kategori"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:390px; margin-top:-5px;"/></a>
		</div>
	</div>
</body>
</html>