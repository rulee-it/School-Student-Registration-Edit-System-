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

<label>Address</label>

<div id = "addressContainer">

<?php
$addresses = explode(',', $row['address']);
foreach($addresses as $address){

?>

<div class = "address-row" draggable = "true">

<span style = "font-size:20px;">☰</span>

<input type = "text"
        name = "address[]"      
        value = "<?php echo trim($address); ?>">



<button type = "button"
        onclick = "removeAddress(this)">
    Remove 
</button>

</div>
<?php
}
?>

</div>
<br>

<button type = "button"
        onclick = "addAddress()">
    Add Address
</button>

<button type = "submit">
    Update the student
</button>

</form>
</div>

<script>        // JavaScript functions to move the address rows up and down

function addAddress(){          
        let container = document.getElementById('addressContainer');  
        let div = document.createElement('div');        

        div.className = "address-row";  

        div.setAttribute('draggable', 'true');

        div.innerHTML = '<span class = "drag-handle">☰</span>' +
                        '<input type = "text" name = "address[]" placeholder = "Enter address">' +
                        '<button type = "button" onclick = "removeAddress(this)">Remove Address</button>';
        container.appendChild(div);




}

//backend functions to move the address rows up
function moveUp(button){
        let row= button.parentElement;
        let previous = row.previousElementSibling;

        if(previous){
                row.parentNode.insertBefore(row, previous);
        }
}

//backend functions to move the address rows down
function moveDown(button){
        let row = button.parentElement;
        let next = row.nextElementSibling;

        if(next){

                //row.parentNode.insertBefore(next, row);
                next.after(row);
        }
}

function removeAddress(button){
        //button.parentElement.remove();
        let row = button.parentElement;
        row.remove();
}

//container creation for dragging the address rows
const container = document.getElementById('addressContainer');
let draggedItem = null;

container.addEventListener('dragstart', function(e){
        draggedItem = e.target;
        e.target.classList.add('dragging');     //adds the css feature to the current address row
});

container.addEventListener('dragend', function(e){
        e.target.classList.remove('dragging');  //removes the css function after dropping
});

container.addEventListener('dragover', function(e){
        e.preventDefault();
        const afterElement = getDragAfterElement(container, e.clientY); // gets the element after which the dragged item should be placed based on the current mouse position

        if(afterElement == null){       // if there is no element after the current position, it means we are at the end of the list, so we append the dragged item to the end of the container
                container.appendChild(draggedItem);

        }else{
                container.insertBefore(draggedItem, afterElement);
        }

});

//address dragging functioning
function getDragAfterElement(container, y){
        const draggableElements = [...container.querySelectorAll('.address-row:not(.dragging)')];       // gets all the address rows that are not currently being dragged and converts the NodeList into an array

        return draggableElements.reduce((closest, child) => {   //reduce loops through all address rows and finds the one that is closest to the current mouse position (y) and returns it as the element after which the dragged item should be placed
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;

                if(offset < 0 && offset > closest.offset){
                        return {
                                offset: offset,
                                element:child
                        };
                }else{
                        return closest;
                }
        
        },
        {
                offset: Number.NEGATIVE_INFINITY

        }
        ).element;
}


</script>


</body>
</html>