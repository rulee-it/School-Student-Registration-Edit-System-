<?php

include 'db/connection.php';

$id = $_GET['id'];

$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<h2>Student Details</h2>

<p>
<b>Full Name:</b> 

<?php 
echo $row['first_name'] . " " . 
    $row['middle_name'] . " " . 
    $row['last_name']; 
?>

</p>

<p>
    <b>Gender:</b>
    <?php echo $row['gender']; ?>
</p>

<p>
    <b>Age:</b>
    <?php echo $row['age']; ?>
</p>

<p>
    <b>Birthdate</b>
    <?php echo $row['birthdate']; ?>
</p>

<p>
    <b>Homephone:</b>
    <?php echo $row['homephone']; ?>
</p>

<p>
    <b>Cellphone:</b>
    <?php echo $row['cellphone']; ?>
</p>

<p>
    <b>Address:</b>
    <?php echo $row['address']; ?>
</p>

<p>
    <b>Religion:</b>
    <?php echo $row['religion']; ?>
</p>

