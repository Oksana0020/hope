
function checkIDEntered() {
    let appointmentID = document.getElementById("appointment_id").value;
    if (appointmentID == "") {
        alert("Appointment ID has to be entered.");
        return false;
    }
    if (!/^[0-9]+$/.test(appointmentID)) {
        alert("Appointment ID must contain only numbers (0-9).");
        return false;
    }
    return true;
}


function checkDoctorEntered() {
    let DSurname = document.getElementById("DSurname").value;
    if (DSurname == "") {
        alert("Doctor's name has to be entered."); 
        return false;
    } 
    return true;
}

function checkServiceIDEntered() {
    let serviceID = document.getElementById("service_id").value.trim();
    if (serviceID === "") {
        alert("Service ID has to be entered.");
        return false;
    }
    if (!/^[0-9]+$/.test(serviceID)) {
        alert("Service ID must contain only numbers (0-9).");
        return false;
    }
    return true;
}






