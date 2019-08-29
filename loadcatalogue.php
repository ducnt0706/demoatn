<?php
require_once './header.php';
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
            while ($row = mysqli_fetch_array($result)) {
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

