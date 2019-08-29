<?php
require_once 'header.php';
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
        while ($row = mysqli_fetch_array($result)) {
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

