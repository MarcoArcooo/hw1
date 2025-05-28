<?php

    session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
        exit;
    }
    $accesskey = '6LclXoC31wut3LfDYpniG34kIUFv6Z4OgC3bgC5V_x8';
     $query = urlencode($_POST["q"]);
    $url = 'https://api.unsplash.com/search/photos?query='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: `Client-ID $accesskey")); 
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
    
    $conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));
    $user = mysqli_real_escape_string($conn, $_SESSION['user']);
    $request = "INSERT INTO ricerche(user, ric) value('$user', '$query')";
    mysqli_query($conn, $request);
    mysqli_close($conn);
?>