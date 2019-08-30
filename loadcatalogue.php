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
        <span>ATN MANAGEMENT</span>
<span id="logincontent"><a href="logout.php">Log out</a></span>
<span class="bar"><a href="index.php">ATN WEB</a></span>
     </span>

</div>
<?php
//query load
$query = "SELECT catid, name from catalogue";
//query when search
if(isset($_POST['keyword'])){
    $keyword = $_POST['keyword'];
    $query = $query . " WHERE name LIKE '%$keyword%' OR catid LIKE '%$keyword%'";
}

$result = doQuery($query);
$msg = "";
if (!$result){
    $msg = "Not Found, Please Try Again!";
}
?>

<!--form search-->
<br><br>
<div class="mid-content">
    <form action="loadcatalogue.php" method="post">
        Search catalogue:
        <input type="search" name="keyword"/>
        <input type="submit" value="Go"/>
    </form>
</div>
<br>
<!--form load data-->
<div class="row">
        <table class="mid-content">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Options</th>
            </tr>
            <?php
            foreach ($result as $row) {
                $CaId = $row[0];
                $CaName = $row[1];
                echo "<tr>";
                echo "<td>$CaId</td>";
                echo "<td>$CaName</td>";
                ?>
                <td>
                    <form  action="deletecatalogue.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="CaId" value="<?php echo $row[0] ?>" />
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

