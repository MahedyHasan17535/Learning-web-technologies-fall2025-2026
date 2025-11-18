const app=document.getElementById("app")

const calc = document.createElement("div");
calc.style.width = "200px";
calc.style.padding = "10px";
calc.style.border = "1px solid #000";
app.appendChild(calc);

const display = document.createElement("input");
display.disabled = true;
display.style.width = "100%";
display.style.height = "40px";
display.style.fontSize = "20px";
display.style.textAlign = "right";
calc.appendChild(display);

let powerOn = false;

const onBtn = document.createElement("button");
onBtn.textContent = "ON";
onBtn.style.width = "100%";
onBtn.style.height = "40px";
onBtn.style.margin = "5px 0";
onBtn.style.backgroundColor = "green";
onBtn.style.color = "white";
calc.appendChild(onBtn);

const offBtn = document.createElement("button");
offBtn.textContent = "OFF";
offBtn.style.width = "100%";
offBtn.style.height = "40px";
offBtn.style.margin = "5px 0";
offBtn.style.backgroundColor = "red";
offBtn.style.color = "white";
calc.appendChild(offBtn);



const nums = ["7","8","9","4","5","6","1","2","3","0"];
const numButtons = [];

nums.forEach(n => {
    const btn = document.createElement("button");
    btn.textContent = n;
    btn.style.width = "40px";
    btn.style.height = "40px";
    btn.style.margin = "2px";

    btn.disabled = true;

    btn.addEventListener("click", () => {
        if (powerOn) display.value += n;
    });

    numButtons.push(btn);
    calc.appendChild(btn);
});

let firstNumber = null;
let operator = null;

const plusBtn = document.createElement("button");
plusBtn.textContent = "+";
plusBtn.style.width = "40px";
plusBtn.style.height = "40px";
plusBtn.style.margin = "2px";
plusBtn.disabled = true;
plusBtn.style.backgroundColor = "green";
calc.appendChild(plusBtn);

const minusBtn = document.createElement("button");
minusBtn.textContent = "-";
minusBtn.style.width = "40px";
minusBtn.style.height = "40px";
minusBtn.style.margin = "2px";
minusBtn.disabled = true;
minusBtn.style.backgroundColor = "red";
calc.appendChild(minusBtn);

const divBtn = document.createElement("button");
divBtn.textContent = "/";
divBtn.style.width = "40px";
divBtn.style.height = "40px";
divBtn.style.margin = "2px";
divBtn.disabled = true;
divBtn.style.backgroundColor = "gray";
calc.appendChild(divBtn);

const multiBtn = document.createElement("button");
multiBtn.textContent = "*";
multiBtn.style.width = "40px";
multiBtn.style.height = "40px";
multiBtn.style.margin = "2px";
multiBtn.disabled = true;
multiBtn.style.backgroundColor = "yellow";
calc.appendChild(multiBtn);

const clearBtn = document.createElement("button");
clearBtn.textContent = "CLEAR";
clearBtn.style.width = "70px";
clearBtn.style.height = "45px";
clearBtn.style.margin = "3px";
clearBtn.disabled = true;
calc.appendChild(clearBtn);

const equalBtn = document.createElement("button");
equalBtn.textContent = "=";
equalBtn.style.width = "100%";
equalBtn.style.height = "45px";
equalBtn.style.margin = "5px 0";
equalBtn.disabled = true;
calc.appendChild(equalBtn);

onBtn.addEventListener("click", () => {
    powerOn = true;
    display.disabled = false;

    numButtons.forEach(b => b.disabled = false);
    plusBtn.disabled = false;
    minusBtn.disabled = false;
    divBtn.disabled = false;
    multiBtn.disabled = false;
    clearBtn.disabled = false;
    equalBtn.disabled = false;
});

offBtn.addEventListener("click", () => {
    powerOn = false;
    display.disabled = true;
    display.value = "";

    numButtons.forEach(b => b.disabled = true);
    plusBtn.disabled = true;
    minusBtn.disabled = true;
    divBtn.disabled = true;
    multiBtn.disabled = true;
    clearBtn.disabled = true;
    equalBtn.disabled = true;

    firstNumber = null;
    operator = null;
});

plusBtn.addEventListener("click", () => {
    if (!powerOn || display.value === "") return;
    firstNumber = Number(display.value);
    operator = "+";
    display.value = "";
});

equalBtn.addEventListener("click", () => {
    if (!powerOn || display.value === "") return;

    const secondNumber = Number(display.value);

    if (operator === "+") display.value = firstNumber + secondNumber;
})



