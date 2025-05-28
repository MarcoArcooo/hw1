<?php

   session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
        exit;
    }
    

$colore = urlencode($_GET["q"]); 
$url = 'https://www.thecolorapi.com/id?rgb='.$colore;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$res = curl_exec($ch);
curl_close($ch);

echo $res;


?>