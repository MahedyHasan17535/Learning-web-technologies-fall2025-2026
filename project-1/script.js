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

function validateMedicineNameBlur() {
    var val = document.getElementsByName('medicine_name')[0].value.trim();
    if (!val) { showError('medicine-name-error', 'Medicine name is required'); return false; }
    if (!isValidMedicineText(val)) { showError('medicine-name-error', 'Name must contain only letters and spaces'); return false; }
    clearError('medicine-name-error');
    return true;
}

function validateCategoryBlur() {
    var val = document.getElementsByName('category')[0].value.trim();
    if (!val) { showError('category-error', 'Category is required'); return false; }
    if (!isValidMedicineText(val)) { showError('category-error', 'Category must contain only letters and spaces'); return false; }
    clearError('category-error');
    return true;
}

function validatePriceBlur() {
    var val = document.getElementsByName('price')[0].value.trim();
    if (!val) { showError('price-error', 'Price is required'); return false; }
    if (!isFloatOrInt(val)) { showError('price-error', 'Must be a valid number (e.g. 150 or 150.50)'); return false; }
    clearError('price-error');
    return true;
}

function validateQuantityBlur() {
    var val = document.getElementsByName('quantity')[0].value.trim();
    if (!val) { showError('quantity-error', 'Quantity is required'); return false; }
    if (!isAllDigits(val)) { showError('quantity-error', 'Quantity must be a positive whole number'); return false; }
    clearError('quantity-error');
    return true;
}

function validateMedicine() {
    var isNameValid = validateMedicineNameBlur();
    var isCategoryValid = validateCategoryBlur();
    var isPriceValid = validatePriceBlur();
    var isQuantityValid = validateQuantityBlur();

    var finalResult = isNameValid && isCategoryValid && isPriceValid && isQuantityValid;

    if (finalResult) {
        alert("Medicine data is valid and ready to be added!");
    } else {
        alert("Please correct the errors in the form.");
    }
    
    return finalResult;
}