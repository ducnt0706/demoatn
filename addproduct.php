<?php
require_once 'header.php';
//getting the data
$msg = "";
if (isset($_POST['add'])) {
    $ProID = $_POST['ProID'];
    $ProName = $_POST['ProName'];
    $ProPrice = $_POST['ProPrice'];
    $ProStatus= $_POST['ProStatus'];
    $CaID = $_POST['CaID'];
    $ProContent = $_POST['ProContent'];
    //handle add image
    $ProImage = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['ProImage']) && $_FILES['ProImage']['size'] != 0) {
        $temp_name = $_FILES['ProImage']['tmp_name'];
        $name = $_FILES['ProImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $ProImage = "$ProID.$extension";
        $destination = "./images/$ProImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }

    //Add product
    $query = "INSERT INTO item values ('$ProID','$ProName','$ProImage','$ProStatus',
             '$ProPrice','$ProContent','$CaID')";
    $result = doQuery($query);
    if (!$result) {
        $msg = "Can't add product, please try again";
    } else {
        $msg = "Added $ProName successfully!";
    }
}
?>
<!--form add product-->
<br><br>
<div class="mid-content">
    <form action="addproduct.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <div class="msg"><?php echo $msg; ?></div>
            <legend>Add product</legend>
            Catalogue:<br>
            <select name="CaID" required>
                <?php
                $query = "SELECT catid, name FROM catalogue";
                $result = doQuery($query);
                while ($row = mysqli_fetch_array($result)) {
                    $CaId = $row[0];
                    $CaName = $row[1];
                    echo "<option value='$CaId'>$CaName</option>";
                }
                ?>
            </select><br>
            ID : <br>
            <input type="text" name="ProID" required/><br>
            Name: <br>
            <input type="text" name="ProName"  required/><br>
            Status: <br>
            <input type="text" name="ProStatus"  required/><br>
            Price: <br>
            <input type="number" name="ProPrice"/><br>
            Image:<br>
            <input type="file" name="ProImage"/><br>
            Description:<br>
            <textarea name="ProContent" ></textarea>
            <br>
            <input type="submit" value="Add" name="add"/>
        </fieldset>
    </form>

</div>

<?php require_once 'footer.php'?>

