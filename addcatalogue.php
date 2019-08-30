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
?>
<!--nav-->
<div class="nav">
    <!--postion make hide bar when small screen-->

    <!--bar when large screen-->

    <span class="bardrop">Catalogue
    	<ul class="drop-content">
    		<li><a href="addcatalogue.php">Add New!</a> </li>
    		<li><a href="loadcatalogue.php">Edit</a> </li>
    	</ul>
    </span>
    <span class="bardrop">Product
    	<ul class="drop-content">
    		<li><a href="addproduct.php">Add New!</a> </li>
    		<li><a href="loadproduct.php">Edit</a> </li>
    	</ul>
    </span>

    <span id="logintus">
        <span>ATN MANAGEMENT</span>
<span id="logincontent"><a href="logout.php">Log out</a></span>
<span class="bar"><a href="index.php">ATN WEB</a></span>
     </span>

</div>
<?php
$msg = "";
if (isset($_POST['catname'])) {
    $Name = $_POST['catname'];
    $Content=$_POST['catcontent'];
    $Id=$_POST['catid'];
    $query = "INSERT INTO catalogue (catid, name, content) 
              values ('$Id','$Name','$Content')";
    $result = doQuery($query);
    if (!$result) {
        $msg ="Add fail or duplicate!";
    } else {
        $msg = "Added successfully!";
    }
}
?>
<br>
<div class="row">
    <div class="mid-content">
        <form action = "addcatalogue.php" method = "post">
            <fieldset class = "fitContent">
                <legend>Add catalogue</legend>
                <p><?php echo $msg?></p>
                Id : <br>
                <input type="text" name="catid" /><br>
                Name : <br>
                <input type="text" name="catname" /><br>
                Description: <br>
                <textarea name="catcontent" ></textarea><br>
                <input type="submit"  value="Add" /><br>
            </fieldset>
        </form>
    </div>
</div>


<?php require_once 'footer.php'?>

