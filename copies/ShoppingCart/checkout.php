<?php require "../../config/database.php";

require "../../navbar.php";

session_start();

if (!isset($_SESSION['customer'])){
    $error = "must be logged in as a customer to buy items";
	setcookie('error',$error);
    header("location: ../SQLi/items.php");
}

$user = $_SESSION['id'];

$stmt = $con->prepare("SELECT * FROM `GVWA`.`customers` WHERE ID = ?");
$stmt->bind_param("i",$user);
$stmt->execute();

$res = $stmt->get_result();
$row = $res->fetch_assoc();

$balance = ($row['balance']);

$fee = 0;

foreach($_SESSION["cart_item"] as $k => $v) {
    $fee = $fee + $v['price'];
}


print_r($_SESSION["cart_item"]);

$outstanding = $balance - $fee;

if ($outstanding >= 0){

    navigation_bar();

    print_r($_SESSION["cart_item"]);
    
    $sql = "UPDATE customers
    SET balance = $outstanding
    WHERE ID = $user;";

    $raw_results = mysqli_query($con,  $sql) or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

    $sql = "SELECT * FROM `GVWA`.`customers` WHERE ID = $user";
    $raw_results = mysqli_query($con,  $sql) or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

    $row = mysqli_fetch_assoc($raw_results);
    

    $balance = $row['balance'];
    $error = "Order placed, new balance is: $balance";
    echo $error;
	$_SESSION["error"] = $error;
    unset($_SESSION["cart_item"]);
    header("location: shoppingCart.php");

}
else{
    $error ="Not enough money, Current Balance is: $balance";
	$_SESSION["error"] = $error;
    header("location: shoppingCart.php");
}


?>