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
            <input class="btn" style="width:100px;" type="submit" value="<?php echo $caName ?>">
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
        <button  class="btnspec"><a href="#buycontent">Buy Now!!</a></button>
    </div>
</div>
</div>



<!--load product-->

<div class="row3" id="buycontent">
    <!--section arrange-->
    <div class="column-14">
        <div class="mid-content">
            <h3>Sorted By</h3>
        </div>
    </div>
    <!--section showdata-->
    <div class="column-34">
        <!--show name catalogue-->
        <div class="mid-content">
            <?php
            if(isset($_POST['catid'])){
                $mscat=$_POST['catid'];
                $query="SELECT name FROM catalogue WHERE catid='$mscat'";
                $result=doQuery($query);
                foreach($result as $row){
                    $namecat=$row['name'];
                    echo"<h3>$namecat</h3>";
                }
            }

            ?>
        </div>

        <!--seach product form-->
        <br><br>
        <div class="mid-content">
            <form action="index3.php" method="post">
                Search product:
                <input type="search" name="keyword"/>
                <input class="btnspec" type="submit" value="Go"/>
            </form>
        </div>
        <br>
        <!--load product-->
        <?php
        if(isset($_POST['catid'])){
            $qry="SELECT name,avatar,status,price,content FROM item WHERE catid='$mscat'";
            //query when search
            if(isset($_POST['keyword'])){
                $keyword = $_POST['keyword'];
                $qry = $qry . " AND name LIKE '%$keyword%' OR id LIKE '%$keyword%'";
            }
            $result=doQuery($qry);
            foreach ($result as $row){
                $iname=$row['name'];
                $iavatar=$row['avatar'];
                $istatus=$row['status'];
                $iprice=$row['price'];
                $icontent=$row['content'];
                echo "<div class='card-normal'>";
                echo "<span><img class='avatar' src='./images/". $iavatar . "' ></span>";
                echo "<div class='mid-content'>$iname<br>$istatus<br>$iprice<br>$icontent<br></div>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div></div>
</div>
<br>
</body>
</html>
