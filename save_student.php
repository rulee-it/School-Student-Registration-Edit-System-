<?php

include 'db/connection.php';

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$birthdate = $_POST['birthdate'];
$place_of_birth = $_POST['place_of_birth'];
$homephone = $_POST['homephone'];
$cellphone = $_POST['cellphone'];
$address = $_POST['address'];
$religion = $_POST['religion'];

$query = "INSERT INTO students
(first_name, middle_name, last_name, gender, age, birthdate,
place_of_birth, homephone, cellphone, address, religion)

VALUES

('$first_name', '$middle_name', '$last_name', '$gender', '$age', '$birthdate',
'$place_of_birth', '$homephone', '$cellphone', '$address', '$religion')";

if(mysqli_query($conn, $query)){

    echo "\nStudent Registered Successfully";

}else{

    echo "Error : " . mysqli_error($conn);
}

?>