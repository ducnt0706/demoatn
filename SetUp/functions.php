<?php

//connect to database
$db = parse_url(getenv("DATABASE_URL"));
$conn = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

//do all SQL query
function doQuery($query){
    global $conn;
    $result=$conn->query($query);
    if(!$result){
        die($conn->error);
    }
    return $result;
}

//encrypted password
function passwordToToken($password){
    $sal1="5k^)@";
    $sal2="!#$+=";
    $token=hash("ripemd128","$sal1$password$sal2");
    return $token;
}
//Security and prevent hacking
function sanitizeString($str){
    global $conn;
    //remove html tags
    $str=strip_tags($str);
    //encode html (for special characters)
    $str=htmlentities($str);

    //don't use magic quotes
    if(get_magic_quotes_gpc()){
        $str=stripslashes($str);
    }
    //avoid MySQl injection
    $str=$conn->real_escape_string($str);

    return $str;
}

//function make User Account with token and prevent hacking
function addAccount($name,$username,$password){
    //encode password
    $token=passwordToToken($password);
    //check exist username on database
    $query="SELECT * FROM account WHERE username='$username'";
    $result=doQuery($query);
    $row=mysqli_fetch_assoc($result);
    if(!$row){//non exist this user on database
        //query to insert data
        $query1="INSERT INTO account (uname, username, passwd) VALUES ('$name','$username','$token')";
        doQuery($query1);
        return 1;//added
    }else{
        return 0;//not added
    }

}

?>