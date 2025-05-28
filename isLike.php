<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


$conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));


$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);
$user = mysqli_real_escape_string($conn, $_SESSION['user']);


$query = "SELECT * FROM mipiace WHERE id_foto='$id' AND username='$user'";
$res = mysqli_query($conn, $query);

$results = array();
$row = mysqli_fetch_assoc($res);
    $results = $row;

mysqli_free_result($res);
mysqli_close($conn);
echo json_encode($results);

?>