<?php include_once 'header.php';?>

<?php
$login=false;
$msg="";
if (isset($_POST['login_btn'])) {
    require_once '.\SetUp\functions.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name="";
    if (empty($user)|| empty($pass)) {
        $msg = "Some field is empty!";
    } else {
        $token = passwordToToken($pass);
        $result = doQuery("SELECT * FROM account WHERE username = '$user' AND passwd = '$token' ");
        $count=$result->fetchColumn();
        if ($count > 0) {
             global $login;
             $login=true;
            //$loginname=$result->fetch_object()['uname'];
            header("Location: managepage.php"); //go to index.php
            exit();
        } else {
            global $login;
            $login=false;
            $msg = "Username or Password is incorrect!";
            header("Location: indexmanage.php");
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
