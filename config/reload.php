<?php

$page = $_GET['page_name'];

#/var/www/html/exploits/SQLi/user_login.php

#call a = newFileFinder
#then writeOver



$command = 'python copy_files.py ' . $page;
$output =  shell_exec($command);
?>