const form = document.getElementById("form");
const container = document.createElement("div");
form.appendChild(container);

const title = document.createElement("h1");
title.textContent = "FORM";
container.appendChild(title);

const input = document.createElement("input");
input.placeholder= "enter field label....";
container.appendChild(input);

const typeSelect = document.createElement("select");
["text","number","email","date","password"].forEach(type=>{
    const option = document.createElement("option");
    option.value = type;
    option.textContent = type.charAt(0) + type.slice(1)
    typeSelect.appendChild(option);
});
container.appendChild(typeSelect);

const addBtn = document.createElement("button")
addBtn.textContent="ADD ";
container.appendChild(addBtn);

const generatedFields = document.createElement("div");
container.appendChild(generatedFields);

const saveBtn = document.createElement("button")
saveBtn.textContent="SAVE ";
container.appendChild(saveBtn);

const savedData = document.createElement("div");
savedData.id="saveData";
container.appendChild(savedData);

addBtn.addEventListener("click", () => {
    const label = input.value.trim();
    const type = typeSelect.value;

    if (label === "") {
        alert("Field label cannot be empty!");
        return;
    }

    const fieldWrapper = document.createElement("div");
    fieldWrapper.className = "dynamic-field";

    const fieldLabel = document.createElement("label");
    fieldLabel.textContent = label;
    fieldWrapper.appendChild(fieldLabel);

    const fieldInput = document.createElement("input");
    fieldInput.type = type;
    fieldInput.placeholder = label;
    fieldInput.dataset.label = label;
    fieldWrapper.appendChild(fieldInput);

    generatedFields.appendChild(fieldWrapper);

    input.value = "";
});

saveBtn.addEventListener("click", () => {
    const allInputs = generatedFields.querySelectorAll("input");
    if (allInputs.length === 0) {
        alert("Please add at least one field!");
        return;
    }

    let valid = true;
    const data = {};

    allInputs.forEach(input => {
        if (input.value.trim() === "") valid = false;
        data[input.dataset.label] = input.value;
    });

    if (!valid) {
        alert("Please fill all fields before saving!");
        return;
    }
     savedData.innerHTML = "<h3>Saved Data:</h3>";
    for (let key in data) {
        const p = document.createElement("p");
        p.innerHTML = `<strong>${key}:</strong> ${data[key]}`;
        savedData.appendChild(p);
    }
});