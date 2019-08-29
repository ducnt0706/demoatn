<div class="nav">
    <!--postion make hide bar when small screen-->
     
    <!--bar when large screen-->
    
    <span class="bar">Catalogue
    	<ul class="drop-content">
    		<li><a href="addcatalogue.php">Add New!</a> </li>
    		<li><a href="loadcatalogue.php">Edit</a> </li>
    	</ul>
    </span>
    <span class="bar">Product
    	<ul class="drop-content">
    		<li><a href="addproduct.php">Add New!</a> </li>
    		<li><a href="loadproduct.php">Edit</a> </li>
    	</ul>
    </span>
    
    <span id="logintus">
        <span>Chào <?php echo $sessionname; ?></span>
        <span><img src="" alt=""></span>
        <span id="logincontent"><a href="logout.php">Log out</a></span>
        <span class="bar"><a href="index.php">ATN shop</a></span>
    </span>

</div>