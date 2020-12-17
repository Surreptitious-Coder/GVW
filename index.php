
<!DOCTYPE html>
<html>
<body>

<a href=./exploits/SQLi/user_login.php>Customer Login page</a>
<br>

<a href=./exploits/SQLi/seller_login.php>Seller Login page</a>
<br>

<a href=./exploits/SQLi/items.php>Items page</a>
<br>

<a href=./exploits/Files/uploadNewItem.php>Item upload page</a>
<br>

<a href=./config/database_creation.php>Database Creation page</a>
<br>

<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();

if(isset($_SESSION["error"])){
  $error = $_SESSION["error"];
  echo "<span>$error</span>";
}

print_r($_SESSION);
if(!isset($_SESSION['id'])) {
  echo "Hello Anonymous user";
} else {
  echo "Hello  " . $_SESSION['username'];
  echo "<a href=./logout.php>Logout</a>
  <br>";
  print_r($_SESSION);

  $id = $_SESSION['id'];
  echo "<a href=./exploits/profiles?id=$id>Profile</a>";
}
unset($_SESSION["error"]);

?>

</body>
</html>