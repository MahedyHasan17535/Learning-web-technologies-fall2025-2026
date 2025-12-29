function isValidRoomNo(str) {
    if (str.length === 0) return false;
    for (var i = 0; i < str.length; i++) {
        var ch = str.charAt(i);
        if (ch < '0' || ch > '9') return false;
    }
    return true;
}

function isValidText(str) {
    if (str.length === 0) return false;
    for (var i = 0; i < str.length; i++) {
        var ch = str.charAt(i);
        var isLetter = (ch >= 'a' && ch <= 'z') || (ch >= 'A' && ch <= 'Z');
        var isDigit = (ch >= '0' && ch <= '9');
        var isSpace = (ch === ' ');
        if (!isLetter && !isDigit && !isSpace) return false;
    }
    return true;
}

function isFloatOrInt(str) {
    if (str.length === 0) return false;
    var cleanStr = str.replace('tk', '').trim();
    return !isNaN(parseFloat(cleanStr));
}

function showError(id, msg) {
    var el = document.getElementById(id);
    if (el) {
        el.textContent = msg;
        el.style.color = "red";
        el.style.fontSize = "12px";
    }
}

function clearError(id) {
    var el = document.getElementById(id);
    if (el) el.textContent = '';
}

function validateRoomNoBlur() {
    var val = document.getElementsByName('room_no')[0].value.trim();
    if (!val) { showError('room-no-error', 'Room number is required'); return false; }
    if (!isValidRoomNo(val)) { showError('room-no-error', 'Must contain only digits'); return false; }
    clearError('room-no-error');
    return true;
}

function validateRoomTypeBlur() {
    var val = document.getElementsByName('room_type')[0].value;
    if (!val) { showError('room-type-error', 'Please select a room type'); return false; }
    clearError('room-type-error');
    return true;
}

function validateFloorBlur() {
    var val = document.getElementsByName('floor')[0].value.trim();
    if (!val) { showError('floor-error', 'Floor is required'); return false; }
    clearError('floor-error');
    return true;
}

function validatePriceBlur() {
    var val = document.getElementsByName('price')[0].value.trim();
    if (!val) { showError('price-error', 'Price is required'); return false; }
    if (!isFloatOrInt(val)) { showError('price-error', 'Must be a valid number'); return false; }
    clearError('price-error');
    return true;
}

function validateStatusBlur() {
    var val = document.getElementsByName('status')[0].value;
    if (!val) { showError('status-error', 'Please select a status'); return false; }
    clearError('status-error');
    return true;
}

function validatePatientBlur() {
    var val = document.getElementsByName('patient_name')[0].value.trim();
    if (val.length > 0 && !isValidText(val)) { 
        showError('patient-error', 'Invalid characters in name'); 
        return false; 
    }
    clearError('patient-error');
    return true;
}

function validateRoom() {
    var isRoomNoValid = validateRoomNoBlur();
    var isTypeValid = validateRoomTypeBlur();
    var isFloorValid = validateFloorBlur();
    var isPriceValid = validatePriceBlur();
    var isStatusValid = validateStatusBlur();
    var isPatientValid = validatePatientBlur();

    var finalResult = isRoomNoValid && isTypeValid && isFloorValid && isPriceValid && isStatusValid && isPatientValid;

    if (finalResult) {
        alert("Form validated successfully!");
    }
    
    return finalResult;
}