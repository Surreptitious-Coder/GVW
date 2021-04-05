<?php
session_start();
require "../../navbar.php";


if(isset($_SESSION["error"])){
	$error = $_SESSION["error"];
	echo "<span>$error</span>";
  }

unset($_SESSION["error"]);

navigation_bar();

?>

<HTML>
<HEAD>
<link href="../../css/checkout.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<h1>Shopping Cart</h1>

<?php 


if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" width= "450px" height = "300px" object-fit= "cover"/></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td class="price">£<?=$item_price?></td>
				<td style="text-align:center;"><a href="updateShoppingCart.php?action=remove&code=<?php echo $item["name"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>

</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 

}
?>

<div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">£<?=$total_price?></span>
        </div>
<td></td>
</div>

<div class="buttons">
<form action="checkout.php">
<button class="button1" type="submit">Checkout</button>
</form>


<a class="button1" type="submit" href = "updateShoppingCart.php?action=empty"> Empty Cart </a>

</div>

</br>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __DIR__;?>/checkout.php id="page_name" name="page_name"/>
    <input type="submit" value="Reset Checkout" />
</form>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __DIR__;?>/updateShoppingCart.php id="page_name" name="page_name"/>
    <input type="submit" value="Reset Shopping Cart Functionality" />
</form>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value=<?php echo __FILE__;?> id="page_name" name="page_name"/>
    <input type="submit" value="Reset Shopping Cart" />
</form>

</BODY>
</HTML>
