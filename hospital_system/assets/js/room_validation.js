
function isValidRoomText(str) {
    if (str.length === 0) return false;
    for (var i = 0; i < str.length; i++) {
        var ch = str.charAt(i);
        var isLetter = (ch >= 'a' && ch <= 'z') || (ch >= 'A' && ch <= 'Z');
        var isSpace = (ch === ' ');
        if (!isLetter && !isSpace) return false;
    }
    return true;
}

function isAllDigits(str) {
    if (str.length === 0) return false;
    for (var i = 0; i < str.length; i++) {
        var ch = str.charAt(i);
        if (ch < '0' || ch > '9') return false;
    }
    return true;
}

function showError(field, msg) {
    clearError(field);
    var span = document.createElement("span");
    span.className = "error-message";
    span.textContent = msg;
    span.style.color = "red";
    span.style.fontSize = "12px";
    span.style.display = "block";
    field.parentNode.appendChild(span);
    field.style.borderColor = "red";
}

function clearError(field) {
    var parent = field.parentNode;
    var err = parent.querySelector(".error-message");
    if (err) parent.removeChild(err);
    field.style.borderColor = "";
}


function validateRoomNumber(field) {
    var val = field.value.trim();
    if (val === "") { showError(field, 'Room number is required'); return false; }
    clearError(field);
    return true;
}

function validateRoomType(field) {
    if (field.value === "") { showError(field, 'Please select a room type'); return false; }
    clearError(field);
    return true;
}

function validateFloor(field) {
    var val = field.value;
    if (val === "") { showError(field, 'Please select a floor'); return false; }
    var floorNum = parseInt(val);
    if (floorNum < 1 || floorNum > 7) { showError(field, 'Floor must be between 1-7'); return false; }
    clearError(field);
    return true;
}

function validateCapacity(field) {
    var val = field.value.trim();
    if (val === "" || !isAllDigits(val) || parseInt(val) <= 0) { 
        showError(field, 'Enter valid capacity (min 1)'); 
        return false; 
    }
    clearError(field);
    return true;
}

function validatePrice(field) {
    var val = field.value.trim();
    if (val === "" || parseFloat(val) <= 0) { showError(field, 'Put a valid price'); return false; }
    clearError(field);
    return true;
}

function validateFacilities(field) {
    var val = field.value.trim();
    if (val === "") { showError(field, 'Facilities information is required'); return false; }
    clearError(field);
    return true;
}

function validateStatus(field) {
    if (field.value === "") { showError(field, 'Please select status'); return false; }
    clearError(field);
    return true;
}

// --- Main Form Validation ---

function validateRoomForm(form) {
    var valid = true;

    if (!validateRoomNumber(form.elements['room_number'])) valid = false;
    if (!validateRoomType(form.elements['room_type'])) valid = false;
    if (!validateFloor(form.elements['floor'])) valid = false;
    if (!validateCapacity(form.elements['capacity'])) valid = false;
    if (!validatePrice(form.elements['price_per_day'])) valid = false;
    if (!validateFacilities(form.elements['facilities'])) valid = false;
    if (!validateStatus(form.elements['status'])) valid = false;
    
    return valid;
}