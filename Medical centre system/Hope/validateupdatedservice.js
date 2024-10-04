function validateUpdateForm() {
    let UpdatedServiceName = document.getElementById("Name").value;
    let UpdatedSDescription = document.getElementById("Description").value;
    let UpdatedRate = document.getElementById("Rate").value;
    let errorMessage = "";

    if (UpdatedServiceName === "") {
        errorMessage += "Updated service name must be entered.\n";
    }
    if (UpdatedSDescription === "") {
        errorMessage += "Updated service description must be entered.\n";
    }
    if (UpdatedRate.trim() === "") {
        errorMessage += "Updated rate can't be just spaces.\n";
    }
    else if (isNaN(UpdatedRate) || parseFloat(UpdatedRate) <= 0) {
        errorMessage += "Updated rate must be a numeric value greater than 0.\n";
    }
    
    // check if Service name is not numeric and has a maximum length of 18 characters
    if (!/^[a-zA-Z\s]*$/.test(UpdatedServiceName) || UpdatedServiceName.length > 18 || !/[a-zA-Z]/.test(UpdatedServiceName)) {
        errorMessage += "Service must contain only letters (upper or lower case) and should be less than 18 characters.\n";
        if(!/[a-zA-Z]/.test(UpdatedServiceName)) {
            errorMessage += "Service name can't contain just spaces.\n";
        }
    }


    // check if if Description is not numeric and has a maximum length of 25 characters
    if (!/^[a-zA-Z\s]*$/.test(UpdatedSDescription) || UpdatedSDescription.length > 25 || !/[a-zA-Z]/.test(UpdatedSDescription)) {
        errorMessage += "Description must contain only letters and spaces and should be less than 25 characters.\n";
        if(!/[a-zA-Z]/.test(UpdatedSDescription)) {
            errorMessage += "Service description can't contain just spaces.\n";
        }
    }

    if (errorMessage !== "") {
        alert(errorMessage);
        return false;
    }

    return true;
}

