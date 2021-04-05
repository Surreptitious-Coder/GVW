<?php require "../config/database.php";
// Initialize the session
session_start();

error_reporting(E_ERROR | E_PARSE);
if(isset($_SESSION["error"])){
	$error = $_SESSION["error"];
	echo "<span>$error</span>";
    unset($_SESSION["error"]);
}
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    $error = "Already logged in";
    $_SESSION["error"] = $error;
    header("location: ../");
    exit();
}
 
$allow = array("123.456.789", "127.0.0.1", "789.123.456"); //allowed IPs

print_r($_SERVER);

if(!isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $allow)) {
    $error = "wrong IP address";
    $_SESSION["error"] = $error;
    header("location: ../");
    exit();

}

unset($_SESSION["error"]);

?>
<!DOCTYPE html>
<html>

<head>
<u> Hidden admin Login page </u>
<link href="../../CSS/login.css" rel="stylesheet" type="text/css"> 
</head>

<body>
<div id="form">
<form action="admin_login_processor.php" method="POST">

<p>
<label> Username </label>
<input type="text" id="Username" name="username"/>
</p>

<p>
<label> Password </label>
<input type="text" id="Password" name="password"/>
</p>

<p>
<input type="submit" id="button" value="Login"/>
</p>

</form>
</div>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __DIR__;?>/admin_login_processor.php id="page_name" name="page_name"/>
    <input type="submit" value="Reset Login backend" />
</form>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __FILE__;?> id="page_name" name="page_name"/>
    <input type="submit" value="Reset Login Frontend" />
</form>


</body>
</html>