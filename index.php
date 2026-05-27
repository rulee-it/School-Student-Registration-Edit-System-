<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="js/validation.js"></script>
</head> 

<body>
<div class="container">
    <h1>New Student Registration</h1>

    <form action="save_student.php"
            method = "POST"
            onsubmit="return validateForm()">

           <div class="form-group">
                <label>First Name</label>
                <input type="text"
                        name = "first_name"
                        id = "first_name">

           </div>
           
           <div class="form-group">
                <label>Middle Name</label>
                <input type="text"
                        name = "middle_name"
                        id = "middle_name">
           </div>

           <div class="form-group">
                <label>Last Name</label>
                <input type="text"
                        name = "last_name"
                        id = "last_name">
           </div>

           <d class = "form-group">
                <label>Gender</label>

            <input type = "radio"
                    name = "gender"
                    value = "Male"> Male

            <div class = "form-group">
            <input type = "radio"
                    name = "gender"
                    value = "female"> Female
           </div>

           <div class = "form-group">
            <label>Age</label>
            <input type = "number"
                    name = "age">

           </div>

           <div class = "form-group">
            <label>Birthdate</label>
            <input type = "date"
                    name = "birthdate">
            
            </div>

            <div class = "form-group">
                <label>Place Of Birth</label>
                <input type = "text"
                        name = "place_of_birth">
            </div>

            <div class = "form-group">
                <label>Home Phone</label>
                <input type = "text"
                        name = "homephone">
            </div>

            <div class = "form-group">
                <label>Cell Phone</label>
                <input type = "text"
                        name = "cellphone">
            </div>

            <div class = "form-group">
                <label>Address</label>
                <textarea name = "address"></textarea>
            </div>


            <div class = "form-group">
                <label>Religion</label>
                <input type = "text"
                        name = "religion">
            </div>

            <button type = "submit">Submit Registration</button>
    </form>


</div>    

</body>
</html>