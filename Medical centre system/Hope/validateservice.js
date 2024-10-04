function validateForm() {
    
    let ServiceName = document.getElementById("ServiceName").value;
    let SDescription = document.getElementById("SDescription").value;
    let Rate = document.getElementById("Rate").value;
    let Status = document.getElementById("Status").value;
    let errorMessage = "";

    // check if fields are empty
    if (ServiceName === "" || SDescription === "" || Rate === "" || Status === "") {
        errorMessage += "All fields are required.\n";
    }

    // check if Service name is not numeric and has a maximum length of 18 characters
    if (!/^[a-zA-Z\s]*$/.test(ServiceName) || ServiceName.length > 18) {
        errorMessage += "Service name must consist only of letters (upper or lower case) and should be less than 18 characters.\n";  
    }
    
    if (/^\s*$/.test(ServiceName)) {
        errorMessage += "Service name can't contain just spaces.\n";
    }

    // check if if Description is not numeric and has a maximum length of 25 characters
    if (!/^[a-zA-Z\s]*$/.test(SDescription) || SDescription.length > 25) {
        errorMessage += "Description must not be numeric and should be less than 25 characters.\n";
        
    }
    
    if(/^\s*$/.test(SDescription)) {
        errorMessage += "Service description can't contain just spaces.\n";
    }

    // checking if Rate is numeric and greater than 0
    if (isNaN(Rate) || parseFloat(Rate) <= 0) {
        errorMessage += "Rate must be a numeric value greater than 0.\n";
    }
    
    if (Rate.trim() === "") {
        errorMessage += "Updated rate can't be just spaces.\n";
    }

    // checking if Status is valid
    if (Status !== "A" && Status !== "D") {
        errorMessage += "Status must be 'A' (Active) or 'D' (Discontinued).\n";
    }

    // Displaying error message
    if (errorMessage !== "") {
        alert(errorMessage);
        return false;
    }

    return true;
}