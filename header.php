
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" >
    <title>Document</title>
</head>
<body>
<?php
require_once './SetUp/functions.php';
//check login status to show header

if($login==true){
    //if is logi
    ?>
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
        <span>Chào <?php echo "AE"; ?></span>
<span><img src="" alt=""></span>
<span id="logincontent"><a href="logout.php">Log out</a></span>
<span class="bar"><a href="index.php">ATN shop</a></span>
</span>

</div>
<?php
}else{
    //if isn't login
    ?>

<?php
}
?>

