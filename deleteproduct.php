<?php
session_start();
require_once './SetUp/functions.php';
if (isset($_POST['ProId'])) {
    $ProId = $_POST['ProId'];
    $query = "DELETE FROM item WHERE id = '$ProId'";
    doQuery($query);
    header("Location: loadproduct.php");
    exit();
}
?>