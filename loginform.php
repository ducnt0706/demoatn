
<?php
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
        $row=pg_fetch_assoc($result);
        if ($result->num_rows == 0) {
            $msg = "Username or Password is incorrect!";
            header("Location: indexmanage.php");
        } else {
            require_once 'session.php';
            $sessiontus=true;
            $sessionuser=$user;
            $sessionname=$row['uname'];
            header("Location: managepage.php"); //go to index.php
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
