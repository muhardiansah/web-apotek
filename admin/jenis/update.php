<?php
	ob_start();	
	
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		
		$result=$db->query("SELECT * FROM tbljenis WHERE idjenis=$id");
		$row=$result->fetch_assoc();
		$kategori=$db->query("SELECT * FROM tblkategori");
		$db->close();
		
	} else {
	
		include ("../../config/koneksi.php");
			$jenis=$_GET['data'];
			$id=$_GET['id'];
			$ide=$_GET['ide'];
		
			$query="UPDATE tbljenis SET idkategori=?,jenis=? WHERE idjenis=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('sss',$ide,$jenis,$id);
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
	<div id="container">
		<div class="jenis_insert">
			<h2 style="margin-left:230px;">Ubah Data</h2>
			<form action='jenis/update.php' method='get'>
				<fieldset>
					<dl>
						<dt><label>Pilih Kategori : </label></dt>
						<dd><select name="ide">
							<?php
								while ($k=$kategori->fetch_assoc()){
								if ($row['idkategori']==$k['idkategori']){
								echo "<option value='".$k['idkategori']."'selected>".$k['kategori']."</option>";
								} else {
								echo "<option value='".$k['idkategori']."'>".$k['kategori']."</option>";
								}
								}
				?>
						</select></dd>
					</dl>
					<dl>
						<dt><label>Jenis : </label></dt>
						<dd><input type='text' name='data' value='<?php echo $row["jenis"]?>'></input></dd>
						<dd><input type='hidden' name='id' value='<?php echo $row["idjenis"]?>'></input></dd>
					</dl>
					<dl class="submit">
						<button type="submit" name="btn" value="simpan">Simpan</button>
					</dl>
					
				</fieldset>
					
			</form>	
			<a href="?p=jenis"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:437px; margin-top:-5px;"/></a>
			
		</div>
	</div>
</body>
</html>


	