<?php
require_once './SetUp/functions.php';
if (isset($_POST['CaId'])) {
    $CaId = $_POST['CaId'];
    $query = "DELETE FROM catalogue WHERE catid = '$CaId'";
    doQuery($query);
    header("Location: loadcatalogue.php");
    exit();
}
?>

