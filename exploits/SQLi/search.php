<?php include "../../config/database.php";

session_start();


if(isset($_COOKIE["error"])){
    $error = $_COOKIE["error"];
    unset($_COOKIE["error"]);
    setcookie("error", '', time() - 60*60*24); // WebKit
    setcookie("error", '', time() - 60*60*24, '/'); 
}

echo "<span>$error</span>";


if( isset( $_REQUEST[ 'Submit' ] ) ) {
	// Get input
    $category = $_REQUEST[ 'category' ];
    echo $category;

	// Check database
	$query  = "SELECT name,price FROM GVWA.items WHERE  `category` = '$category'";
    $raw_results = mysqli_query($con,  $query ) or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

	// Get results
	while( $row = mysqli_fetch_assoc( $raw_results ) ) {
		// Get values
		$first = $row["name"];
		$last  = $row["price"];

		// Feedback for end user
		echo "<pre><br />Item Name : {$first}<br />Price: {$last}</pre>";
	}

	mysqli_close($con);
}
unset($_SESSION["error"]);
?>