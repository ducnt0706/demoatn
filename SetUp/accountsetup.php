<?php
require_once "functions.php";

//this  to create some user account of admin
//Account 1
echo "3. Create user accounts: ";
echo "</br>";

$name='Tester';
$username='test';
$pass='1';
if(addAccount($name,$username,$pass)){
    echo "Adding account $username successfully";
}else{
    echo "Adding fail or User already exists";
}
echo "</br>";
$name='Nguyen Trung Duc';
$username='bigboss';
$pass='duc1';
if(addAccount($name,$username,$pass)){
    echo "Adding account $username successfully";
}else{
    echo "Adding fail or User already exists";
}
echo "</br>";
?>