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

const powerBtn = document.createElement("button");
powerBtn.textContent = "OFF";
powerBtn.style.width = "100%";
powerBtn.style.height = "40px";
powerBtn.style.margin = "5px 0";
calc.appendChild(powerBtn);

const nums = ["7","8","9","4","5","6","1","2","3","0"];
const numButtons = [];

nums.forEach(n => {
    const btn = document.createElement("button");
    btn.textContent = n;
    btn.style.width = "45px";
    btn.style.height = "45px";
    btn.style.margin = "3px";

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
plusBtn.style.width = "45px";
plusBtn.style.height = "45px";
plusBtn.style.margin = "3px";
plusBtn.disabled = true;
calc.appendChild(plusBtn);

