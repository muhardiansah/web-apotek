<?php

	include ("../config/koneksi.php");
	
	$query="SELECT COUNT(iduser)FROM tbluser";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);
	$jdata=$row[0];
	$data=1;
	$jhal=ceil($jdata/$data);
	
	if (isset($_GET['h'])){
		$nohal=$_GET['h'];
	}	else{
		$nohal=1;
	}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
	</head>
	<body>
		<div class="right_content">
		
			<h2 style="margin-top:-13px; margin-left:-20px;">Identitas Toko</h2> 
			<div style="margin:-45px 15px;">
				<a href='?p=toko&a=tambah' class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Data</strong><span class="bt_green_r"></span></a>			
			</div>
			
			<?php
			
				$mulai=($nohal-1)*$data;
				$result=$db->query("SELECT * FROM tbltoko LIMIT $mulai,$data");
			
			?>
			
			<table id="rounded-corner">
				<thead>
					<tr>
						<th class="rounded-company">No</th>
						<th>Logo</th>
						<th>Detail Toko</th>
						<th>Edit</th>
						<th class="rounded-q4">Delete</th>
					</tr>
				</thead>
				
			<?php
			
				while ($row=$result->fetch_assoc()){
					$mulai++;
					echo"<tbody>";
						echo"<tr>";
							echo"<td>";
								echo $mulai;
							echo"</td>";
							echo'<td>
									<img width="130" height="150" src="img/'.$row['logo'].'" >
								</td>';
							echo"<td>";
								echo"<table style='margin-left:130px;'>";
									echo"<tr>";
										echo"<td>";	
											echo"Nama";	
										echo"</td>";
										echo"<td>";
											echo":";
										echo"</td>";
										echo"<td>";
											echo $row['nama'];
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td>";	
											echo"Alamat";	
										echo"</td>";
										echo"<td>";	
											echo":";	
										echo"</td>";
										echo"<td>";
											echo $row['alamat'];
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td>";
											echo"No Telpon";
										echo"</td>";
										echo"<td>";
											echo":";
										echo"</td>";
										echo"<td>";
											echo $row['notelp'];
										echo"</td>";
										
									echo"</tr>";
									echo"<tr>";
										echo"<td>";
											echo"No Rek";
										echo"</td>";
										echo"<td>";
											echo":";
										echo"</td>";
										echo"<td>";
											echo $row['norek'];
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td>";
											echo"Slogan";
										echo"</td>";
										echo"<td>";
											echo":";
										echo"</td>";
										echo"<td>";
											echo $row['slogan'];
										echo"</td>";
									echo"</tr>";
								echo"</table>";
							echo"</td>";
							echo"<td>";
								echo"<a href='?p=toko&a=ubah&id=".$row['idtoko']."'><input type='image' src='images/user_edit.png' alt='' title=''></input></a>";
							echo"</td>";
							echo"<td>";
								echo"<a href='?p=toko&a=hapus&id=".$row['idtoko']."'><input type='image' src='images/trash.png' alt='' title=''></input></a>";
							echo"</td>";
						echo"</tr>";
					echo"</tbody>";
				}
				
					echo"</table>";
			
			?>
		
		</div>
	
	</body>

</html>