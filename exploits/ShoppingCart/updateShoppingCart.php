<?php require "../../config/database.php";

session_start();


if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
	$error = "must be logged as a customer to buy items";
	$_SESSION["error"] = $error;
    header("location: ../SQLi/items.php");
    exit;
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
    case "add":
        if (!empty($_POST["quantity"])) {
            $stmt = $con->prepare("SELECT * FROM items WHERE ID =?");
            $stmt->bind_param("i", $_GET['code']);
            $stmt->execute();

            $res = $stmt->get_result();
            $productByCode = $res->fetch_assoc();
            
            $price = $_GET['price'];
            $itemArray = array($productByCode["ID"]=>array('name'=>$productByCode["name"], 'ID'=>$productByCode["ID"], 'quantity'=>$_POST["quantity"], 'price'=>$price, 'image'=>$productByCode["image"]));
            
            if (!empty($_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($productByCode["name"] == $v['name']){
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
            } else {
                $_SESSION["cart_item"] = $itemArray;
			}
			$error = "item successfully added";
			$_SESSION["error"] = $error;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
        }
    break;
    case "remove":
        if (!empty($_SESSION["cart_item"])) {    
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_GET["code"] == $v['name']) {
                    unset($_SESSION["cart_item"][$k]);
                    $error = "Item removed";
                    $_SESSION["error"] = $error;
                    header("location: shoppingCart.php");
                    break;
                }
                
                if (empty($_SESSION["cart_item"])) {
                    unset($_SESSION["cart_item"]);
                }
            }

        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
        $error = "Cart Emptied";
        $_SESSION["error"] = $error;
        header("location: shoppingCart.php");

    break;
}
}

?>