<?php require "../config/database.php";


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


$sql = "DROP DATABASE IF EXISTS GVWA";
errorChecking($sql,$con);

$sql = "CREATE DATABASE GVWA";
errorChecking($sql,$con);

//customers
$sql = "CREATE TABLE `GVWA`.`customers` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(20) NOT NULL , `admin` BOOLEAN NOT NULL DEFAULT FALSE , `seller` BOOLEAN NOT NULL DEFAULT FALSE ,  UNIQUE `ID` (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "ALTER TABLE `GVWA`.`customers` ADD `balance` INT(10) NOT NULL ;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`customers` (`ID`, `username`, `password`, `admin`, `seller`, `balance`) VALUES (NULL, 'JamesJonahJameson', 'rockyou2', '0' , '0','10'), (NULL, 'PeterParker', 'password123', '0', '0','10'), (NULL, 'Veronica', '112223333', '0', '0','10'), (NULL, 'Samuel', 'Glasgow1991', '0' , '0' ,'10'), (NULL, 'HaCk3rMaN', 'TotallySecure2018', '0' , '0' ,'10')";
errorChecking($sql,$con);

//sellers

$sql = "CREATE TABLE `GVWA`.`sellers` ( `ID` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(20) NOT NULL , `admin` BOOLEAN NOT NULL DEFAULT FALSE , `seller` BOOLEAN NOT NULL DEFAULT TRUE, PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`sellers` (`ID`, `username`, `password`, `admin`, `seller`) VALUES (1, 'Robert', 'abc123', '0', '1'), (2, 'Scarlett', 'abc1234', '0', '1')";
errorChecking($sql,$con);

//categories
$sql = "CREATE TABLE `GVWA`.`categories` ( `name` VARCHAR(20) NOT NULL , PRIMARY KEY (`name`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`categories` (`name`) VALUES ('A'), ('B'), ('C'), ('D'), ('E')";
errorChecking($sql,$con);

//items
$sql = "CREATE TABLE `GVWA`.`items` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `category` VARCHAR(20) NOT NULL , `name` VARCHAR(20) NOT NULL , `price` INT NOT NULL , `image` BLOB NULL DEFAULT NULL , `description` MEDIUMTEXT NOT NULL , `sellerID` INT(10) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);


$sql = "ALTER TABLE `GVWA`.`items` ADD FOREIGN KEY (`sellerID`) REFERENCES `sellers`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`items` (`ID`, `category`, `name`, `price`, `image`, `description`, `sellerID`) VALUES (NULL, 'A', 'A1', '10', NULL, 'A1',1), (NULL, 'A', 'A2', '20', NULL, 'A2',1), (NULL, 'B', 'B1', '25', NULL, 'b1',2), (NULL, 'B', 'B2', '99', NULL, 'b2',1), (NULL, 'C', 'c1', '1', NULL, 'c1',2), (NULL, 'C', 'c2', '2', NULL, 'c2',2)";
errorChecking($sql,$con);

$sql = "ALTER TABLE `GVWA`.`items` ADD FOREIGN KEY (`category`) REFERENCES `categories`(`name`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
errorChecking($sql,$con);

//item reviews
$sql = "CREATE TABLE `GVWA`.`reviews` ( `ID` INT NOT NULL AUTO_INCREMENT ,`author_id` INT NOT NULL, `product_ID` INT NOT NULL , `rating` INT NOT NULL , `review` MEDIUMTEXT NOT NULL ,  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "ALTER TABLE `GVWA`.`reviews` ADD CONSTRAINT `product` FOREIGN KEY (`product_ID`) REFERENCES `items`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
errorChecking($sql,$con);


$sql = "ALTER TABLE `GVWA`.`reviews` ADD CONSTRAINT `author` FOREIGN KEY (`author_id`) REFERENCES `customers`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`reviews` (`ID`, `author_id`, `product_ID`, `rating`, `review`) VALUES (NULL, '1', '1', '4', 'I want spiderman'), (NULL, '1', '1', '3', 'I really want spiderman'), (NULL, '2', '1', '5', 'ha lol'), (NULL, '3', '3', '2', 'Not enough BoS'), (NULL, '4', '4', '4', 'enough BoS')";
errorChecking($sql,$con);

//admin
$sql = "CREATE TABLE `GVWA`.`admin` ( `ID` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(20) NOT NULL , `admin` BOOLEAN NOT NULL DEFAULT TRUE , `seller` BOOLEAN NOT NULL DEFAULT FALSE, PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
errorChecking($sql,$con);

$sql = "INSERT INTO `GVWA`.`admin` (`ID`, `username`, `password`, `admin`,`seller`) VALUES ('1', 'admin', 'GlasgowUni2020', '1','0'), ('2', 'H1dDenAdm1n', 'StopLookingHere2', '1','0')";
errorChecking($sql,$con);




$con->close();

?>

