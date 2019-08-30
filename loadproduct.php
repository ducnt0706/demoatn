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
$query = "SELECT catalogue.name,item.id,item.name,item.price,item.status,item.avatar,item.content  
 FROM item, catalogue where item.catid = catalogue.catid";
if(isset($_POST['keyword'])){
    $keyword = $_POST['keyword'];
    $query = $query . " And item.name LIKE '%$keyword%' OR item.id LIKE '%$keyword%' ";
}
$result = doQuery($query);
$error = $msg = "";
if (!$result){
    $error = "Couldn't load data, please try again.";
}
?>
<!--seach product form-->
<br><br>
<div class="mid-content">
    <form action="loadproduct.php" method="post">
        Search product:
        <input type="search" name="keyword"/>
        <input type="submit" value="Go"/>
    </form>
</div>
<br>
<!--load product-->
<div class="row">
    <table class="mid-content">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Catalogue</th>
            <th>Description</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
        <?php
        foreach ($result as $row) {
            $ProID = $row[1];
            $ProName = $row[2];
            $ProPrice = $row[3];
            $ProImage = $row[5];
            $CaName = $row[0];
            $ProDescription = $row[6];
            $ProStatus=$row[4];
            echo "<tr>";
            echo "<td>$ProID</td>";
            echo "<td>$ProName</td>";
            echo "<td>$ProPrice $</td>";
            echo "<td ><img src='./images/". $ProImage . "' height='200px'></td>";
            echo "<td>$CaName</td>";
            echo "<td>$ProDescription</td>";
            echo "<td>$ProStatus</td>";
            ?>
            <td>
                <form class="frminline" action="deleteproduct.php" method="post" onsubmit="return confirmDelete();">
                    <input type="hidden" name="ProId" value="<?php echo $row[1] ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
            <?php
            echo "</tr>";
        }
        ?>

    </table>
</div>


<script>
    function confirmDelete() {
        var r = confirm("Are you sure you would like to delete ?");
        if (r) {
            return true;
        } else {
            return false;
        }
    }
</script>
<?php require_once 'footer.php'?>

