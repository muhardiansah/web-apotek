<?php
	include ("../config/koneksi.php");
	
	$query="SELECT COUNT(idkategori)FROM tblkategori";
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
			
			<h2 style="margin-top:-13px; margin-left:-20px;">Data Kategori</h2> 
			<div style="margin:-45px 15px;">
				<a href='?p=kategori&a=tambah' class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Data</strong><span class="bt_green_r"></span></a>			
			</div>	

			<?php
			
			$mulai=($nohal-1)*$data;
			$result=$db->query("SELECT * FROM tblkategori LIMIT $mulai,$data");
			
			?>
				
			<table id="rounded-corner">
				<thead>
					<tr>
						<th class="rounded-company">No</th>
						<th>Kategori</th>
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
					echo"<td>";
						echo $row['kategori'];
					echo"</td>";
					echo"<td>";
						echo"<a href='?p=kategori&a=ubah&id=".$row['idkategori']."'><input type='image' src='images/user_edit.png' alt='' title=''></input></a>";
					echo"</td>";
					echo"<td>";
						echo"<a href='?p=kategori&a=hapus&id=".$row['idkategori']."'><input type='image' src='images/trash.png' alt='' title=''></input></a>";
					echo"</td>";
				echo"</tr>";
			echo"</tbody>";
		
		
		}
			echo"</table>";
			
			echo"<ul class='pagination'>";
			
				if ($nohal>1)
				{
					echo"<li><a href='?p=kategori&h=".($nohal-1)."'>";
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
					echo"<li class='$class'><a href='?p=kategori&h=$i'>$i</a></li>";
				}
				
				if ($nohal<$jhal)
				{
					echo"<li><a href='?p=kategori&h=".($nohal+1)."'>";
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