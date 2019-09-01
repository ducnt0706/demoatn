<!--header-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" >
    <title>Document</title>
</head>
<body>

<?php
require_once './SetUp/functions.php';
?>

<div class="nav">
    <span class="bar"><a href="index.php">ATN shop</a></span>
    <span class="bar"><a href="./SetUp/accountsetup.php">RunAccount</a></span>
</div>

<!--loginform-->

<?php
$msg="";
if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $name="";
    if (empty($user)|| empty($pass)) {
        $msg = "Some field is empty!";
    } else {
        $token = passwordToToken($pass);
        $result = doQuery("SELECT * FROM account WHERE username = '$user' AND passwd = '$token' ");
        $count=$result->fetchColumn();
        if ($count > 0) {
            header("Location: managepage.php"); //go to index.php
            exit();
        } else {
            $msg = "Username or Password is incorrect!";
            header("Location: indexmanage.php");
            exit();
        }
    }
}
?>

<!--Form to post login data-->
<div class="row2">
    <div class="column-login mid-content">
        <form action="indexmanage.php" method="post">
            <h1>Login</h1>
            <span class="message"><?php echo $msg ?></span>
            <br>
            Username: <br>
            <input type="text" name="user" placeholder=" Username..."  required="" ><br>
            Password : <br>
            <input type="password" name="pass" placeholder=" Password..."  required="" >
            <br><br>
            <input type="submit" name="login_btn" value="Login"></input>
        </form>
    </div>
</div>

<?php include_once 'footer.php';?>
