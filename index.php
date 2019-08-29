<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>ATN SHOP</title>
</head>
<body>
<?php require_once './SetUp/functions.php'?>
<!--nav shop-->
<div class="row-small" >
    <span class="bar"style="float: left"><a href="index.php"><i class="material-icons" style="font-size:36px;">house</i></a></span>
    <span class="bar nameshop" style="position: relative;left: 35%;">ATN TOYs SHOP</span>
    <span class="bar" style="float: right"><a href="indexmanage.php"><i class="material-icons" style="font-size:36px;">attachment</i></a></span>
</div>
<!--nav catalogue-->
<div class="row-small-catalogue">
    <?php
    $query="SELECT catid,name FROM catalogue";
    $result=doQuery($query);
    foreach ($result as $row){
        $caId=$row['catid'];
        $caName=$row['name'];
        echo "<span style='float: left' class='bar'><a href='index3.php'>";
        ?>
        <form action="index3.php" method="post" style="display: inline;">
            <input type="hidden" name="catid" value="<?php echo $caId ?>">
            <input style="width:100px;" type="submit" value="<?php echo $caName ?>">
        </form>
        <?php
        echo "</a></span>";
    }
    ?>
</div>

<div class="row2" ">
    <div class="column-header">
        <!---->
        <div style="color: white;position: relative;top:25%;left:5%">
            <h2>Bring the world of toys to your room!!</h2>
            <h5>Let us make your childhood become beautiful</h5>
            <button>Buy Now!!</button>
        </div>
    </div>
</div>

<div class="beauti-content ">
    <div class="mid-content"><h2>Best Seller!!!</h2></div>
    <?php
    $query = "SELECT id, name, avatar, price, status FROM item WHERE status='hot'";
    $result = doQuery($query);
    foreach ($result as $r) {
    ?>
    <div class="card1 mid-content">
        <div><img src="./images/<?= $r['avatar'] ?>" alt="" class="avatar" ></a></div>
        <div><?= $r['name'] ?></div>
        <div><?= $r['status'] ?></div>
        <div><?= $r['price'] ?></div>
    </div>
<br>
<?php
}
?>
</div>


<br>
</body>
</html>
