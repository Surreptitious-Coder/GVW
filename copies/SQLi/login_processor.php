<?php require "../../config/database.php";

session_start();
/** 
 * // vuln type - login without password/username
 * 
 * TODO:
 * Create a Git repo
 * display error on login page
 * admin login should only be suseptible to blind sql
 * get session related stuff 
*/
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    $username_err = $password_err = "";

    //To prevent MySQL need to use this
    /** 
    $sql = "SELECT Username 
						  FROM Users
						  WHERE Password = :Password";
		$query = $db_connection->prepare($sql);
		$query->bindParam(':Password', $Password);
        $query->execute(); 
    */

    $result = mysqli_query($con,"Select * from GVWA.customers where username = '$Username' and password= '$Password'") ;
    $row = mysqli_fetch_array($result);
 
    if (!$row) {
        echo '<p class="error">The username password combination is wrong!</p>';
    } else {
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $row['ID'];
        $_SESSION["username"] = $Username;   
        $_SESSION["customer"] = 1;
        header("Location: http://127.0.0.1:8080/index.php");
        //start session
        //start custom cookie
        //put seller cookie
        //redirect

        //checks to prevent unathroized users from navigating
            echo '<p class="success">Congratulations, you are logged in!</p>';
    }
?>