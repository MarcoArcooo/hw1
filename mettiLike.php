<?php

    session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
        exit;
    }

    $id = $_POST['id'];
    $colleg = $_POST['l'];
    
      $conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));
        $id = mysqli_real_escape_string($conn, $id);
        $colleg =mysqli_real_escape_string($conn, $colleg);
        $user = mysqli_real_escape_string($conn, $_SESSION['user']);
       $query = "INSERT INTO mipiace(username, id_foto, foto) VALUES('$user', '$id', '$colleg')";
       mysqli_query($conn, $query);
       mysqli_close($conn);

?>