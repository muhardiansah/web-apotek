<?php
	ob_start();	
	
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$id=$_GET['id'];
		
		$result=$db->query("SELECT * FROM tblvendor WHERE idvendor=$id");
		$row=$result->fetch_assoc();
		
		$jenis=$db->query("SELECT * FROM tbljenis");
		$db->close();
		
	} else {
	
		include ("../../config/koneksi.php");
			$vendor=$_GET['data'];
			$id=$_GET['id'];
			$ide=$_GET['ide'];
		
			$query="UPDATE tblvendor SET idjenis=?,vendor=? WHERE idvendor=?";
			
			$stmt=$db->prepare($query);
			$stmt->bind_param('sss',$ide,$vendor,$id);
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
	<div id="container">
		<div class="vendor_insert">
			<h2 style="margin-left:230px;">Ubah Data</h2>
			<form action='vendor/update.php' method='get'>
				<fieldset>
					<dl>
						<dt><label>Pilih Jenis :</label></dt>
						<dd><select name="id">
							<?php
								while ($k=$jenis->fetch_assoc()){
								if ($row['idjenis']==$k['idjenis']){
								echo "<option value='".$k['idjenis']."'selected>".$k['jenis']."</option>";
								} else {
								echo "<option value='".$k['idjenis']."'>".$k['jenis']."</option>";
								}
								}
							?>
						</select></dd>
					</dl>
					<dl>
						<dt><label>Vendor :</label></dt>
						<dd><input type='text' name='data' value='<?php echo $row["vendor"]?>'/></dd>
						<dd><input type='hidden' name='id' value='<?php echo $row["idvendor"]?>'/></dd>
					</dl>
					<dl class="submit">
						<button type="submit" name="btn" value="simpan">Simpan</button>
					</dl>
					
				</fieldset>
					
			</form>	
			<a href="?p=vendor"><input type="image" src="images/back.jpg" style="width:35px; height:35px; margin-left:437px; margin-top:-5px;"/></a>
			
		</div>
	</div>
</body>
</html>


	