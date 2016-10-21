<?php
	
	include ("../config/koneksi.php");
	
	$query="SELECT COUNT(idbarang)FROM tblbarang";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result); 
	$jdata=$row[0];
	$data=5;
	$jhal=ceil($jdata/$data);
	
	if (isset($_GET['h'])){
		$nohal=$_GET['h'];
	} else{ 
		$nohal=1;
	}

?>

<html>
	<body>
		<head>
			<link rel="stylesheet" type="text/css" href="../style.css" />
		</head>
		
		<div class="right_content">            
			
			<h2 style="margin-top:-13px; margin-left:-20px;">Data Barang</h2> 
			<div style="margin:-45px 15px;">
				<a href='?p=barang&a=tambah' class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Data</strong><span class="bt_green_r"></span></a>			
			</div>	

				<?php
				
				$mulai=($nohal-1)*$data;
				$result=$db->query("SELECT tblbarang.idbarang, tblbarang.idvendor, tblbarang.namabarang, tblbarang.deskripsi, 
									tblbarang.gambar, tblbarang.harga, tblbarang.stok, tblbarang.diskon, tblvendor.vendor
									FROM tblvendor INNER JOIN tblbarang ON tblvendor.idvendor = tblbarang.idvendor
									LIMIT $mulai,$data");
				
				?>
				
			<table id="rounded-corner">
				<thead>
					<tr>
						<th class="rounded-company">No</th>
						<th>Produk</th>
						<th>Vendor</th>
						<th>Barang</th>
						<th>Deskripsi</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Diskon</th>
						<th>Edit</th>
						<th class="rounded-q4">Delete</th>
					</tr>
				</thead>
	
	<?php
		while ($row=$result->fetch_assoc()){
			$mulai++;
			echo'<tbody>';
				echo'<tr>';
					echo'<td>';
						echo $mulai;
					echo'</td>';
					echo'<td>
						<img width="95" height="115" src="img/'.$row['gambar'].'" >
						</td>';
					echo'<td>';
						echo $row['vendor'];
					echo"</td>";
					echo'<td>';
						echo $row['namabarang'];
					echo'</td>';
					echo'<td>';
						echo $row['deskripsi'];
					echo'</td>';
					echo'<td>';
						echo $row['harga'];
					echo'</td>';
					echo'<td>';
						echo $row['stok'];
					echo'</td>';
					echo'<td>';
						echo $row['diskon'];
					echo'</td>';
					echo"<td>";
						echo"<a href='?p=barang&a=ubah&id=".$row['idbarang']."'><input type='image' src='images/user_edit.png' alt='' title=''></input></a>";
					echo"</td>";
					echo"<td>";
						echo"<a href='?p=barang&a=hapus&id=".$row['idbarang']."'><input type='image' src='images/trash.png' alt='' title=''></input></a>";
					echo"</td>";
				echo"</tr>";
			echo"</tbody>";
		
		
		}
			echo"</table>";
			
			echo"<ul class='pagination'>";
			
				if ($nohal>1)
				{
					echo"<li><a href='?p=barang&h=".($nohal-1)."'>";
					echo'PREV';
					echo"</a></li>";
				}
				
				else
				{
					echo"<li class='disabled'><a href='#'>PREV</a></li>";
				};
				
				for ($i=1; $i<=$jhal; $i++)
				{
					if ($i==$nohal)
					{
						$class='active';
					}
					else
					{
						$class='';
					};
					echo"<li class='$class'><a href='?p=barang&h=$i'>$i</a></li>";
				}
				
				if ($nohal<$jhal)
				{
					echo"<li><a href='?p=barang&h=".($nohal+1)."'>";
					echo'NEXT';
					echo'</a></li>';
				}
				else
				{
					echo"<li class='disabled'><a href='#'>NEXT</a></li>";
				};
			echo"</ul>";
		
	
	?>
				
		   </div>
	
	</body>

</html>