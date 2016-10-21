<?php
	ob_start();
	
	if (!isset($_POST['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		$result=$db->query("SELECT * FROM tbluser WHERE iduser=$id");
		$row=$result->fetch_assoc();
		$db->close();
		
	} else {
		include ("../../config/koneksi.php");
			$nama=$_POST ['data'];
			$id=$_GET ['id'];
			$alamat=$_POST['alamat'];
			$notelpon=$_POST['notelp'];
			$user=$_POST['user'];
			
			$size=$_FILES['gambar']['size'];
			$gambar=$_FILES['gambar']['name'];
			$type=$_FILES['gambar']['type'];
			$temp=$_FILES['gambar']['tmp_name'];
			
			move_uploaded_file($temp,"../img/".$gambar);
			
			$query="UPDATE tbluser SET gambar=?,nama=?,alamat=?,notelp=?,user=? WHERE iduser=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('ssssss',$id,$nama,$alamat,$notelpon,$user,$gambar);
			$stmt->execute();
			$stmt->close();
			$db->close();
			
			header("Location: ../index.php?p=user");
			
	}
	ob_end_flush();

?>

<html>
<body>
	<head>
		<link rel="stylesheet" href="css/user.css"/>
	</head>
	<div id="container">
		<div class="user_insert">
			<h2 style="margin-left:370px;">Ubah Data</h2>
			<form action='user/update.php' method='POST' enctype="multipart/form-data">
				<fieldset style="margin-left:-90px;">
					<dl>
						<dt><label>Nama :</label></dt>
						<dd><input id='input' type='text' name='data' value='<?php echo $row["nama"]?>'></input></dd>
						
					</dl>
					<dl>
						<dt><label>Alamat :</label></dt>
						<dd><textarea type="text" name="alamat"><?php echo $row ['alamat']?></textarea></dd>
					</dl>
					
					<dl>
						<dt><label>Gambar :</label></dt>
						<dd><input style="margin-top:10px;" type="file" name="gambar"></input></dd>
					</dl>
				</fieldset>
				<fieldset style="margin-left:340px; margin-top:-180px; clear:both; dispaly:block;">
					<dl>
						<dt><label>No Telpon :</label></dt>
						<dd><input id="input" type="text" name="notelp" value="<?php echo $row ['notelp']?>"></input></dd>
					</dl>
					<dl>
						<dt><label>User :</label></dt>
						<dd><input id="input" type="text" name="user" value="<?php echo $row ['user']?>"></input></dd>
					</dl>
					
					<input id='input' type='hidden' name='id' value='<?php echo $row["iduser"]?>'></input>
				
					<dl class="submit">
						<button type="submit" name="btn" value="simpan">Simpan</button>
					</dl>
					
					
				</fieldset>
					
			</form>	
			<a href="?p=user"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:800px; margin-top:-200px; clear:both;"/></a>
			
		</div>
	</div>
</body>
</html>