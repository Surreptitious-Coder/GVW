<?php require "../config/database.php";
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: http://127.0.0.1:8080/");
    exit;
}
 

 
// Define variables and initialize with empty values
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
 
// Processing form data when form is submitted
// Validate credentials
    // Prepare a select statement
$sql = "SELECT id, username, password FROM GVWA.admin WHERE username = ?";

if($stmt = mysqli_prepare($con, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    
    // Set parameters
    $param_username = $username;
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);
        
        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){                    
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
            if(mysqli_stmt_fetch($stmt)){
                if($password == $hashed_password){
                    // Password is correct, so start a new session
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["admin"] = true;                              
                    
                    // Redirect user to welcome page
                    $password_err = "Congrats.";
                    setcookie("error",$password_err);
                    header("location: ../index.php");
                } else{
                    // Display an error message if password is not valid
                    $password_err = "The password/username combo you entered was not valid.";
                    setcookie("error",$password_err);
                    header("location: admin_login.php");
                }
            }
        } else{
            // Display an error message if username doesn't exist
            $username_err = "The password/username combo you entered was not valid.";
            setcookie("error",$username_err);
            header("location: admin_login.php");
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


// Close connection
mysqli_close($con);
?>