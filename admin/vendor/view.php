<?php
	include ("../config/koneksi.php");
	
	$query="SELECT COUNT(idvendor)FROM tblvendor";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result); 
	$jdata=$row[0];
	$data=3;
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
			
			<h2 style="margin-top:-13px; margin-left:-20px;">Data Vendor</h2> 
			<div style="margin:-45px 15px;">
				<a href='?p=vendor&a=tambah' class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Data</strong><span class="bt_green_r"></span></a>			
			</div>	

	<?php
	
	$mulai=($nohal-1)*$data;
	$result=$db->query("SELECT tblvendor.idvendor, tblvendor.idjenis, tblvendor.vendor, tbljenis.jenis
						FROM tbljenis INNER JOIN tblvendor ON tbljenis.idjenis = tblvendor.idjenis
						LIMIT $mulai,$data");
	
	?>
				
			<table id="rounded-corner">
				<thead>
					<tr>
						<th class="rounded-company">No</th>
						<th>Jenis</th>
						<th>Vendor</th>
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
						echo $row['jenis'];
					echo"</td>";
					echo"<td>";
						echo $row['vendor'];
					echo"</td>";
					echo"<td>";
						echo"<a href='?p=vendor&a=ubah&id=".$row['idvendor']."'><input type='image' src='images/user_edit.png' alt='' title=''></input></a>";
					echo"</td>";
					echo"<td>";
						echo"<a href='?p=vendor&a=hapus&id=".$row['idvendor']."'><input type='image' src='images/trash.png' alt='' title=''></input></a>";
					echo"</td>";
				echo"</tr>";
			echo"</tbody>";
		
		
		}
			echo"</table>";
			
			echo"<ul class='pagination'>";
			
				if ($nohal>1)
				{
					echo"<li><a href='?p=vendor&h=".($nohal-1)."'>";
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
					echo"<li class='$class'><a href='?p=vendor&h=$i'>$i</a></li>";
				}
				
				if ($nohal<$jhal)
				{
					echo"<li><a href='?p=vendor&h=".($nohal+1)."'>";
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

