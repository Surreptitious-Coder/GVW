<?php require "../../config/database.php";
session_start();
// proof of concept - change magic numbers on file only
// database upload to docker

// shopping cart system
// add funds to sellers only
// need to check if the user is a seller for file uploading

// vulnerabilities - file upload, remote code execution, directory traversal, hidden field to check if user is a seller

$target_dir = "../../assets/images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$PHPUploadPath = $target_dir;

function xss_clean($data)
{
// Fix &entity\n;
$data = str_replace('src/onerror', '', $data);
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);


// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do
{
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);

// we are done...
return $data;
}

$category = $_POST['category'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$seller = $_POST['seller'];

$description = xss_clean($description);

if( !is_writable( $PHPUploadPath ) ) {
    $error = "<div class=\"warning\">Incorrect folder permissions: {$PHPUploadPath}<br /><em>Folder is not writable.</em></div>";
    setcookie('error',$error);
    header("location: uploadNewItem.php");
}

if($_FILES['image']['size'] > 0) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $stmt = $con->prepare("Select name from `GVWA`.`items` where name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        
        $res = $stmt->get_result();
        $product = $res->fetch_row();

        if (!$product == null) {
            $error = "Item already exists.";
            $_SESSION['error'] = $error;
            header("location: http://127.0.0.1:8080/exploits/Files/uploadNewItem.php");
            exit();
        }

        if ($check["mime"] != "image/png") {
            $error = "File is not png image.";
            $_SESSION['error'] = $error;
            header("location: http://127.0.0.1:8080/exploits/Files/uploadNewItem.php");
            exit();
        } else {



            
            $stmt = $con->prepare("Select ID from `GVWA`.`sellers` where username = ?");
            //$id = mysqli_query($con, $sql) or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
            $stmt->bind_param("s", $seller);
            $stmt->execute();
            $res = $stmt->get_result();
            $seller = $res->fetch_row();

            $seller =  $_SESSION['id'];
        
            $sql = "INSERT INTO `GVWA`.`items` (ID,category, name, price, description, sellerID, image,rating) VALUES (null,'$category', '$name', '$price', '$description', '$seller','$target_file',0)";
            $id = mysqli_query($con, $sql) or die('<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');
            
            $error = "Successful Item upload";
            $_SESSION['error'] = $error;
            header("location: http://127.0.0.1:8080/exploits/Files/uploadNewItem.php");
            exit();
        }
    }
        else{
            $error = "File is not png image.";
            $_SESSION['error'] = $error;
            header("location: http://127.0.0.1:8080/exploits/Files/uploadNewItem.php");
            exit();
        }
    
}
  else{
    $stmt = $con->prepare("Select ID from `GVWA`.`sellers` where username = ?");
    //$id = mysqli_query($con,  $sql); //or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
    $stmt->bind_param("s",$seller);
    $stmt->execute();
    $res = $stmt->get_result();
    $seller = $res->fetch_row();
    $seller =  $seller[0];

    $sql = "INSERT INTO items (ID,category, name, price, description, sellerID,rating) VALUES (null,'$category', '$name', '$price', '$description', '$seller',0)";
    mysqli_query($con,  $sql ) or die( '<pre>' . ((is_object($con)) ? mysqli_error($con) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
    $error = "Successful Item upload";
    $_SESSION['error'] = $error;
    header("location: http://127.0.0.1:8080/exploits/Files/uploadNewItem.php");
    exit();
  }
  // <audio src/onerror=alert(1)> or
  //<img src=x onerror="&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041">
?>