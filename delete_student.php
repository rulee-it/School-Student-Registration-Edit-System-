<?php

include 'db/connection.php';

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id = '$id'";

if(mysqli_query($conn, $query)){

    header("Location: students.php");
    exit();
}else{
    echo "Error : " . mysqli_error($conn);
}

?>