<?php
session_start();

if(isset($_COOKIE["error"])){
    $error = $_COOKIE["error"];

    unset($_COOKIE["error"]);
    setcookie("error", '', time() - 60*60*24); // WebKit
    setcookie("error", '', time() - 60*60*24, '/'); 
}
echo "<span>$error</span>";

if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
	header("location: http://127.0.0.1:8080/exploits/SQLi/items.php");
    exit;
}
unset($_SESSION["error"]);

include "../../navbar.php";
navigation_bar();
?>


<html>
<body>

<link href="../../css/login.css" type="text/css" rel="stylesheet" />
<form method="post" action="login_processor.php" name="signin-form">
<div class="form-element">
    <label>Username</label>
    <input type="text" name="username" required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" />
  </div>
  <button type="submit" id="button" value="Login">Log In</button>
</form>


<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __DIR__;?>/login_processor.php id="page_name" name="page_name"/>
    <input type="submit" value="Reset User Login backend" />
</form>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __FILE__;?> id="page_name" name="page_name"/>
    <input type="submit" value="Reset User Login Frontend" />
</form>


</body>
</html>