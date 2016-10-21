<!DOCTYPE html>
<html>
<head>

	<title>FAITH DISTRO ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ddaccordion.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>


	<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

    <div class="main_content">
    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <form>
            <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
            <input type="image" class="search_submit" src="images/search.png" />
            </form>            
            </div>
    
            <div class="sidebarmenu">
            
                <a class="menuitem submenuheader" href="">Data Master</a>
                <div class="submenu">
                    <ul>
                    <li><a href="?p=kategori">Kategori</a></li>
                    <li><a href="?p=jenis">Jenis</a></li>
                    <li><a href="?p=vendor">Vendor</a></li>
                    <li><a href="?p=barang">Barang</a></li>
                    
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="" >Data Transaksi</a>
                <div class="submenu">
                    <ul>
                    <li><a href="#">Order</a></li>
                    <li><a href="#">Pelanggan</a></li>
                    
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Utilitas</a>
                <div class="submenu">
                    <ul>
                    <li><a href="?p=toko">Identitas Toko</a></li>
                    <li><a href="?p=user">User</a></li>
                    <li><a href="#">Slide</a></li>
                    <li><a href="#">Berita</a></li>
                    <li><a href="#">Komentar</a></li>
					<li><a href="#">Rating</a></li>
                    </ul>
                </div>
                    
            </div>
         
    
    </div>  
		
		<div class="right_content">            

			<?php
			
			
			if ( (isset($_GET['p'])) and (!isset($_GET['a'])) ) {
						$hal=$_GET['p']."/view.php";
					} else if ( (isset($_GET['p'])) and (isset($_GET['a'])) ){
						$a=$_GET['a'];
						if($a=='tambah'){
							$hal=$_GET['p']."/insert.php";
						} 
						if ($a=='ubah'){
							$hal=$_GET['p']."/update.php";
						} 
						if ($a=='hapus') {
						$hal=$_GET['p']."/delete.php";	
						}
					} else {
						$hal="kategori/view.php";
					}
					
					include ($hal);
			
			?>
		   
		 
		</div><!-- end of right content-->
            
                    
	</div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	

</div>		
</body>
</html>