
function isValidMedicineText(str) {
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



function validateMedicineName(field) {
    var val = field.value.trim();
    if (val === "") { showError(field, 'Medicine name is required'); return false; }
    if (!isValidMedicineText(val)) { showError(field, 'Only letters and spaces allowed'); return false; }
    clearError(field);
    return true;
}

function validateGenericName(field) {
    var val = field.value.trim();
    if (val === "") { showError(field, 'Generic name is required'); return false; }
    if (!isValidMedicineText(val)) { showError(field, 'Only letters and spaces allowed'); return false; }
    clearError(field);
    return true;
}

function validateCategory(field) {
    if (field.value === "") { showError(field, 'Please select a category'); return false; }
    clearError(field);
    return true;
}

function validateManufacturer(field) {
    if (field.value.trim() === "") { showError(field, 'Manufacturer is required'); return false; }
    clearError(field);
    return true;
}

function validateUnitPrice(field) {
    var val = field.value.trim();
    if (val === "" || parseFloat(val) <= 0) { showError(field, 'Valid price > 0 required'); return false; }
    clearError(field);
    return true;
}

function validateStockQuantity(field) {
    if (!isAllDigits(field.value)) { showError(field, 'Quantity must be a number'); return false; }
    clearError(field);
    return true;
}

function validateReorderLevel(field) {
    if (!isAllDigits(field.value)) { showError(field, 'Reorder level must be a number'); return false; }
    clearError(field);
    return true;
}

function validateExpiryDate(field) {
    if (field.value === "") { showError(field, 'Expiry date is required'); return false; }
    clearError(field);
    return true;
}

function validateMedicineForm(form) {
    var valid = true;

    if (!validateMedicineName(form.elements['medicine_name'])) valid = false;
    if (!validateGenericName(form.elements['generic_name'])) valid = false;
    if (!validateCategory(form.elements['category'])) valid = false;
    if (!validateManufacturer(form.elements['manufacturer'])) valid = false;
    if (!validateUnitPrice(form.elements['unit_price'])) valid = false;
    if (!validateStockQuantity(form.elements['stock_quantity'])) valid = false;
    if (!validateReorderLevel(form.elements['reorder_level'])) valid = false;
    if (!validateExpiryDate(form.elements['expiry_date'])) valid = false;
    
    return valid;
}