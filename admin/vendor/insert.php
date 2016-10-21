<?php
	ob_start();
	if (!isset($_GET['btn'])){
		include ("../config/koneksi.php");
		$result=$db->query("SELECT * FROM tbljenis ");
		$db->close();
		
	} else{
		include ("../../config/koneksi.php");
		$vendor=$_GET['data'];
		$id=$_GET['id'];
		echo $id.$vendor;
		
		$query="INSERT INTO tblvendor (idjenis,vendor) VALUES (?,?)";
			
		$stmt=$db->prepare($query);
		$stmt->bind_param('ss',$id,$vendor);
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
			<h2 style="margin-left:230px;">Tambah Data</h2>
			<form action='vendor/insert.php' method='get'>
				<fieldset>
					<dl>
						<dt><label>Pilih Jenis :</label></dt>
						<dd><select name="id">
							<?php
								while ($row=$result->fetch_assoc()){
								echo "<option value='".$row['idjenis']."'>".$row['jenis']."</option>";
								}
							?>
						</select></dd>
					</dl>
					<dl>
						<dt><label>Vendor :</label></dt>
						<dd><input type="text" name="data" placeholder="input data"></input></dd>
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
	
	
	
	
	