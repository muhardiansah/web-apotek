<?php
	ob_start();	
	
	if (!isset($_POST['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		
		$query="SELECT * FROM tblbarang WHERE idbarang=$id ";
		$result=$db->query($query);
		$row=$result->fetch_assoc();
		
		$jenis=$db->query("SELECT * FROM tblvendor");
		$db->close();
		
	} else {
	
		include ("../../config/koneksi.php");
			$id=$_POST['id'];
			$ide=$_POST['ide'];
			$namabarang=$_POST['data'];
			$deskripsi=$_POST['deskripsi'];
			$harga=$_POST['harga'];
			$stok=$_POST['stok'];
			$diskon=$_POST['diskon'];
			
			$size=$_FILES['gambar']['size'];
			$gambar=$_FILES['gambar']['name'];
			$type=$_FILES['gambar']['type'];
			$temp=$_FILES['gambar']['tmp_name'];
			
			if ($gambar!='')
			
			{
				$query="UPDATE tblbarang SET idvendor=?,namabarang=?,deskripsi=?,gambar=?,harga=?,stok=?,diskon=? WHERE idbarang=?";
				
				$stmt=$db->prepare($query);
				$stmt->bind_param('ssssssss',$ide,$namabarang,$deskripsi,$gambar,$harga,$stok,$diskon,$id);
			}
			
			else
			{
				$query="UPDATE tblbarang SET idvendor=?,namabarang=?,deskripsi=?,harga=?,stok=?,diskon=? WHERE idbarang=?";
				
				$stmt=$db->prepare($query);
				$stmt->bind_param('sssssss',$ide,$namabarang,$deskripsi,$harga,$stok,$diskon,$id);
			}
			

			move_uploaded_file($temp,"../img/".$gambar);
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('ssssssss',$ide,$namabarang,$deskripsi,$gambar,$harga,$stok,$diskon,$id);
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
	<div id="container">
		<div class="barang_insert">
			<h2 style="margin-left:370px;">Ubah Data</h2>
			<form action='barang/update.php' method='POST' enctype="multipart/form-data">
				<fieldset style="margin-left:-90px;">
					<dl>
						<dt><label>Pilih Vendor :</label></dt>
						<dd><select name="ide">
							<?php
								while ($k=$jenis->fetch_assoc()){
									if ($row['idvendor']==$k['idvendor']){
										echo "<option value='".$k['idvendor']."'selected>".$k['vendor']."</option>";
									} else {
										echo "<option value='".$k['idvendor']."'>".$k['vendor']."</option>";
									}
								}
							?>
						</select></dd>
					</dl>
					<dl>
						<dt><label>Barang :</label></dt>
						<dd><input id='input' type='text' name='data' value='<?php echo $row["namabarang"]?>'></input></dd>
					</dl>
					<dl>
						<dt><label>Deskripsi :</label></dt>
						<dd><textarea type="text" name="deskripsi"><?php echo $row ['deskripsi']?></textarea></dd>
					</dl>
					
					<dl>
						<dt><label>Gambar :</label></dt>
						<dd><input style="margin-top:10px;" type="file" name="gambar"></input></dd>
					</dl>
				</fieldset>
				<fieldset style="margin-left:340px; margin-top:-227px; clear:both; dispaly:block;">
					<dl>
						<dt><label>Harga :</label></dt>
						<dd><input id="input" type="text" name="harga" value="<?php echo $row ['harga']?>"></input></dd>
					</dl>
					<dl>
						<dt><label>Stok :</label></dt>
						<dd><input id="input" type="text" name="stok" value="<?php echo $row ['stok']?>"></input></dd>
					</dl>
					<dl>
						<dt><label>Diskon :</label></dt>
						<dd><input id="input" type="text" name="diskon" value="<?php echo $row ['diskon']?>"></input></dd>
					</dl>
					
					<input type='hidden' name='id' value='<?php echo $row["idbarang"]?>'/>
					<dl class="submit">
						<button type="submit" name="btn" value="simpan">Simpan</button>
					</dl>
					
					
				</fieldset>
					
			</form>	
			<a href="?p=barang"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:800px; margin-top:-200px; clear:both;"/></a>
			
		</div>
	</div>
</body>
</html>


	