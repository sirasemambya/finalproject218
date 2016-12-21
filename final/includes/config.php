<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','sql2.njit.edu'); //same
define('DBUSER','sbs43'); //sbs43
define('DBPASS','hurrah37'); //hurrah37
define('DBNAME','sbs43'); //sbs43

//application address
define('DIR','https://web.njit.edu/~sbs43/is218/final/');
define('SITEEMAIL','sbs43@njit.edu');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
