<?php

	ob_start();
	if (isset($_GET['btn'])){
		include ("../../config/koneksi.php");
		$kategori=$_GET['data'];
		
		$query="INSERT INTO tblkategori (kategori) VALUES (?)";
		
		$stmt=$db->prepare($query);
		$stmt->bind_param('s',$kategori);
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
			<h2 style="margin-left:190px;">Tambah Data</h2>
			<form action='kategori/insert.php' method='get'>
				<fieldset action='kategori/insert.php' method='get'>
					<dl>
						<dt><label>Kategori :</label></dt>
						<dd><input type="text" name="data" placeholder="input data"></input></dd>
					</dl>
					<dl class="submit">
						<button type="submit" name="btn" value="simpan">Simpan</button>
					</dl>
					
				</fieldset>
					
			</form>	
				<a href="?p=kategori"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:390px; margin-top:-5px;"/></a>
			
		</div>
	</div>
</body>
</html>