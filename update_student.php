<?php

include 'db/connection.php';

$id = $_POST['id'];

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$age = $_POST['age'];

$birthdate = $_POST['birthdate'];

$cellphone = $_POST['cellphone'];

$query = "UPDATE students SET first_name = '$first_name', last_name = '$last_name', age = '$age', birthdate = '$birthdate', cellphone = '$cellphone' WHERE id = '$id'";

if(mysqli_query($conn, $query)){
    echo "student updated successfully";

}else{
    echo "error:" . mysqli_error($conn);
}

?>

