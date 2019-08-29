<?php require_once 'header.php'?>
<!--Catalogue-->
<div class="row-catalogue mid-content">
    <?php
    $query="SELECT name FROM catalogue";
    $result=doQuery($query);
    while ($row=mysqli_fetch_assoc($result)){
        $catname=$row['name'];
        echo "<span class='bar'>";

        echo "</span>";
    }
    ?>
</div>
<!--Header-->
<div class="row2">
    <div class="column-header">
        <div class="mid-content">
            <h2>Bring the world of toys to your room!!</h2>
            <h5>Let us make your childhood become beautiful</h5>
        </div>
    </div>
</div>


<?php require_once 'footer.php' ?>
