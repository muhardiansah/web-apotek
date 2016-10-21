<?php
	ob_start();
	if (!isset($_POST['btn'])){
		include ("../config/koneksi.php");
		$result=$db->query("SELECT * FROM tblvendor ");
		$db->close();
		
	} else{
		include ("../../config/koneksi.php");
		$id=$_POST['id'];
		$namabarang=$_POST['data'];
		$deskripsi=$_POST['deskripsi'];
		$harga=$_POST['harga'];
		$stok=$_POST['stok'];
		$diskon=$_POST['diskon'];
		
		$size=$_FILES['gambar']['size'];
		$gambar=$_FILES['gambar']['name'];
		$type=$_FILES['gambar']['type'];
		$temp=$_FILES['gambar']['tmp_name'];

		move_uploaded_file($temp,"../img/".$gambar);
		echo $id.$namabarang.$deskripsi.$harga.$stok.$diskon.$gambar;
		
		$query="INSERT INTO tblbarang (idvendor,namabarang,deskripsi,harga,stok,diskon,gambar) VALUES (?,?,?,?,?,?,?)";
			
		$stmt=$db->prepare($query);
		$stmt->bind_param('sssssss',$id,$namabarang,$deskripsi,$harga,$stok,$diskon,$gambar);
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
			<h2 style="margin-left:370px;">Tambah Data</h2>
			<form action='barang/insert.php' method='POST' enctype="multipart/form-data">
				<fieldset style="margin-left:-90px;">
					<dl>
						<dt><label>Pilih Vendor :</label></dt>
						<dd><select name="id">
							<?php
								while ($row=$result->fetch_assoc()){
									echo "<option value='".$row['idvendor']."'>".$row['vendor']."</option>";
								}
							?>
						</select></dd>
					</dl>
					<dl>
						<dt><label>Barang :</label></dt>
						<dd><input id="input" type="text" name="data" placeholder="input data"></input></dd>
					</dl>
					<dl>
						<dt><label>Deskripsi :</label></dt>
						<dd><textarea type="text" name="deskripsi" placeholder="deskripsikan"></textarea></dd>
					</dl>
					
					<dl>
						<dt><label>Gambar :</label></dt>
						<dd><input style="margin-top:10px;" type="file" name="gambar"></input></dd>
					</dl>
				</fieldset>
				<fieldset style="margin-left:340px; margin-top:-227px; clear:both; dispaly:block;">
					<dl>
						<dt><label>Harga :</label></dt>
						<dd><input id="input" type="text" name="harga" placeholder="input data"></input></dd>
					</dl>
					<dl>
						<dt><label>Stok :</label></dt>
						<dd><input id="input" type="text" name="stok" placeholder="input data"></input></dd>
					</dl>
					<dl>
						<dt><label>Diskon :</label></dt>
						<dd><input id="input" type="text" name="diskon" placeholder="input data"></input></dd>
					</dl>
					
					
					<dl class="submit">
						<button type="submit" name="btn" id="submit" value="simpan">Simpan</button>
					</dl>
					
					
				</fieldset>
					
			</form>	
			<a href="?p=barang"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:800px; margin-top:-200px; clear:both;"/></a>
			
		</div>
	</div>
</body>
</html>
	
	
	
	
	