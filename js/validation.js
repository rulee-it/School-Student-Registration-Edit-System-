function validateForm() {

    let firstName = document.getElementById("first_name").value;

    let lastName = document.getElementById("last_name").value;

    let age = document.getElementById("age").value;

    if(firstName == ""){
        alert("First name must be filled out");
        return false;
    }

    if(lastName == ""){
        alert("Last name must be filled too");
        return false;
    }

    if(age == "" || age<=0){
        alert("Enter a valid age");
        return false;
    }

    return true; //else all conditions are valid
}
