

<!DOCTYPE html>
<html>
<body>

<a href=./exploits/SQLi/user_login.php>Customer Login page</a>
<br>

<a href=./exploits/SQLi/seller_login.php>Seller Login page</a>
<br>

<a href=./exploits/SQLi/admin_login.php>Admin Login page</a>
<br>

<a href=./exploits/SQLi/items.php>Items page</a>
<br>

<a href=./exploits/Files/uploadNewItem.php>Item upload page</a>
<br>

<a href=./config/database_creation.php>Database Creation page</a>
<br>

<?php
session_start();

if(!isset($_SESSION['id'])) {
  echo "Cookie named user id is not set!";
} else {
  echo "Hello  " . $_SESSION['username'];
  echo "<a href=./logout.php>Logout</a>
  <br>";
  print_r($_SESSION);

  ?>
  <a href=./exploits/profiles>Profile</a>
<br>
<?php
}
?>

</body>
</html>