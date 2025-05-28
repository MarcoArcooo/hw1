<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


$conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));
$user = mysqli_real_escape_string($conn, $_SESSION['user']);
$query = "DELETE FROM ricerche WHERE user='$user'";
$res = mysqli_query($conn, $query);
mysqli_close($conn);
 header("Location: cronologia.php");
exit;
?>