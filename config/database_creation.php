<?php require "../config/database.php";

//$con = mysqli_connect("db", $user="devuser",$password="devpass",$database= "GVWA");
//$con = mysqli_connect("localhost","root");

//if (mysqli_connect_errno()){
  //  echo "Error connecting to the database - " . $mysqli_connect_error();
//}

echo "hi";
function sqlQuery($query, $con)
{
    if ($con->query($query) == true) {
        return 1;
    } else {
        return -1;
    }
}

function errorChecking($query, $con){
    if (sqlQuery($query,$con) != 1){
        echo "Error with $query";
    }
}
//CREATE DATABASE IF NOT EXISTS DBName;

//customers
//$sql = "CREATE DATABASE users";
//errorChecking($sql,$con);

//$sql = "CREATE DATABASE products";
//errorChecking($sql,$con);

$sql = "CREATE DATABASE IF NOT EXISTS GVWA";
errorChecking($sql,$con);

$sql = "CREATE TABLE `GVWA`.`customers` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(20) NOT NULL , `admin` BOOLEAN NOT NULL DEFAULT FALSE , UNIQUE `ID` (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`customers` (`ID`, `username`, `password`, `admin`) VALUES (NULL, 'JamesJonahJameson', 'rockyou2', '0'), (NULL, 'PeterParker', 'password123', '0'), (NULL, 'Veronica', '112223333', '0'), (NULL, 'Samuel', 'Glasgow1991', '0'), (NULL, 'HaCk3rMaN', 'TotallySecure2018', '0')";
errorChecking($sql,$con);
//categories

$sql = "CREATE TABLE `GVWA`.`categories` ( `name` VARCHAR(20) NOT NULL , PRIMARY KEY (`name`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`categories` (`name`) VALUES ('A'), ('B'), ('C'), ('D'), ('E')";
errorChecking($sql,$con);

//items

$sql = "CREATE TABLE `GVWA`.`items` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `category` VARCHAR(20) NOT NULL , `name` VARCHAR(20) NOT NULL , `price` INT NOT NULL , `image` BLOB NULL DEFAULT NULL , `description` MEDIUMTEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`items` (`ID`, `category`, `name`, `price`, `image`, `description`) VALUES (NULL, 'A', 'A1', '10', NULL, 'A1'), (NULL, 'A', 'A2', '20', NULL, 'A2'), (NULL, 'B', 'B1', '25', NULL, 'b1'), (NULL, 'B', 'B2', '99', NULL, 'b2'), (NULL, 'C', 'c1', '1', NULL, 'c1'), (NULL, 'C', 'c2', '2', NULL, 'c2')";
errorChecking($sql,$con);

$sql = "ALTER TABLE `GVWA`.`items` ADD FOREIGN KEY (`category`) REFERENCES `categories`(`name`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
errorChecking($sql,$con);

//item reviews


$sql = "CREATE TABLE `GVWA`.`reviews` ( `ID` INT NOT NULL AUTO_INCREMENT , `productID` INT NOT NULL , `rating` INT NOT NULL , `review` MEDIUMTEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "ALTER TABLE `GVWA`.`reviews` ADD CONSTRAINT `product` FOREIGN KEY (`productID`) REFERENCES `items`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
errorChecking($sql,$con);

//admin


$sql = "CREATE TABLE `GVWA`.`admin` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(20) NOT NULL , `admin` BOOLEAN NOT NULL DEFAULT TRUE , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`admin` (`ID`, `username`, `password`, `admin`) VALUES ('1', 'admin', 'GlasgowUni2020', '1'), ('2', 'H1dDenAdm1n', 'StopLookingHere2', '1')";
errorChecking($sql,$con);

$con->close();

?>
