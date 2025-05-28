<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));

$user = mysqli_real_escape_string($conn, $_SESSION['user']);

$query = "SELECT count(*) as num FROM mipiace WHERE username='$user' group by username";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($conn);
echo json_encode($row);
?>