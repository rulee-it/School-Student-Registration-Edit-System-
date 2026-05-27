<?php

include 'db/connection.php';


$id = isset($_GET['id']) ? $_GET['id'] : 0; // got the id from the url

$query = "SELECT * FROM students WHERE id=$id";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);  // fetch the student details of the row and converts the db into an associative array

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit the student</title>

<style>
body{
    font-family : Arial;
    background : #f4f4f4;
}

.container{
    width : 50%;
    margin : auto;
    background : white;
    padding : 30px;
    margin-top : 40px;
    border-radius : 10px;
}

input{
    width : 100%;
    padding: 10px;
    margin-bottom : 15px;
}

button{
    padding : 10px 20px;
    background : #007bff;
    color : white;
    border : none;
}

</style>

</head>

<body>

<div class = "container">

<h2>Edit the student</h2>

<form action = "update_student.php"
        method = "POST">
    
<input type = "hidden"      
        name = "id"
        value = "<?php echo $row['id']; ?>">  

<label>First Name</label>
<input type = "text"
        name = "first_name"
        value = "<?php echo $row['first_name']; ?>">

<label>Last Name</label>
<input type = "text"
        name = "last_name"
        value = "<?php echo $row['last_name']; ?>">

<label>Age</label>
<input type = "number"
        name = "age"
        value = "<?php echo $row['age']; ?>">

<label>Birthdate</label>
<input type = "date"
        name = "birthdate"
        value = "<?php echo $row['birthdate']; ?>">

<label>Cellphone</label>
<input type = "text"
        name = "cellphone"
        value = "<?php echo $row['cellphone']; ?>">

<button type = "submit">
    Update the student
</button>

</form>
</div>
</body>
</html>