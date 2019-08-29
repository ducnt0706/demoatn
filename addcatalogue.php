<?php
require_once 'header.php';
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

