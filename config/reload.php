<?php

$page = $_GET['page_name'];

#/var/www/html/exploits/SQLi/user_login.php

#call a = newFileFinder
#then writeOver



$command = 'python3 copy_files.py ' . $page;
$output =  shell_exec($command);

#echo $output;
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>