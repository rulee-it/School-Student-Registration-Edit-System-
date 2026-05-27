<!--LIST OF STUDENTS-->
<?php

include 'db/connection.php';

$query = "SELECT * FROM students";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registered Students</title>

    <style>

        body{
            font-family: Arial;
            background: #f4f4f4;
        }

        .container{
            width: 90%;
            margin: auto;
            margin-top: 40px;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1{
            text-align: center;
            margin-bottom: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid #ccc;
        }

        th{
            background: #007bff;
            color: white;
        }

        th, td{
            padding: 12px;
            text-align: center;
        }

        tr:nth-child(even){
            background: #f2f2f2;
        }

        .btn{
            padding: 8px 12px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>

</head>

<body>

< class = "container">
    <h1>Registered Students</h1>

    <table>
        <tr>

            <th>ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Homephone</th>
            <th>Cellphone</th>
            <th>Address</th>
            <th>Religion</th>
            <th>Action</th>

        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['first_name'] . " " .
                           $row['middle_name'] . " " .
                           $row['last_name']; ?>
            </td>

            <td>
                <?php echo $row['gender']; ?>
            </td>

            <td>
                <?php echo $row['age']; ?>
            </td>
            
            <td>
                <?php echo $row['birthdate']; ?>
            </td>
            <td>
                <?php echo $row['homephone']; ?>
            </td>
            <td>
                <?php echo $row['cellphone']; ?>
            </td>
            <td>
                <?php echo $row['address']; ?>
            </td>
            <td>
                <?php echo $row['religion']; ?>
            </td>

            <td>
                <button onclick="viewStudent(<?php echo $row['id']; ?>)">
                    View
                </button>

                <br><br>

                <a href="edit_student.php?id=<?php echo $row['id']; ?>">
                    <button type = "button">
                        Edit
                    </button>
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>
    <div id="studentDetails"></div>


</div>

<script>

function viewStudent(id){
    let xhr = new XMLHttpRequest();
    xhr.open("GET",
        "view_student.php?id=" + id,
        true);
    
    xhr.onload = function(){
        if(this.status == 200){
            document.getElementById("studentDetails").innerHTML = this.responseText;
        }
    }
    xhr.send();

}
</script>
</body>
</html>

