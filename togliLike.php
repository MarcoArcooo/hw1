<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


$conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));


$id = $_POST['id'];
$id = mysqli_real_escape_string($conn, $id);
$user = mysqli_real_escape_string($conn, $_SESSION['user']);


$query = "DELETE FROM mipiace WHERE id_foto='$id' AND username='$user'";
mysqli_query($conn, $query);

mysqli_close($conn);
?>