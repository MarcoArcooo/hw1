<?php
    $conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));
    $query = "SELECT * FROM foto";
    $res = mysqli_query($conn, $query);
    $results = array();
    while($row = mysqli_fetch_assoc($res)){
    $results[] = $row;
    }
    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($results);
?>