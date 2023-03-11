
const message = Number('70');
const message2 = String(70);
console.log(typeof message2);
if (message === message2) {
    console.log(true);
} else {
    console.error(false);
}
let myNum = 123.453789;
let myNumExp5 = myNum.toFixed(2);
console.log(myNumExp5);

let fruitList = ['apples', 'oranges', 'bananas'];

let vegList = ['tomatoes', 'potatoes'];

let shoppingList = fruitList.concat(vegList);

let arrayToString = shoppingList.join(',');
console.log(arrayToString);

arrayToString.split(',');
console.log(arrayToString.split(','));

function buildElement(htmlText, htmlClassName) {
    const newDiv = document.createElement("div");
    newDiv.classList.add(htmlClassName)
    // and give it some content
    const newContent = document.createTextNode(htmlText);

    // add the text node to the newly created div
    newDiv.appendChild(newContent);
    newDiv.style.color = 'red';
    newDiv.style.fontSize = '20px';
    newDiv.style.fontStyle = 'italic';
    newDiv.style.fontFamily = 'verdana, serif';
    // add the newly created element and its content into the DOM
    document.body.append(newDiv);
}

function log(logMessage, level, textContent, className) {
    if (level === 'error') {
        console.error(logMessage);
    } else if (level === 'warning') {
        console.warn(logMessage);
    } else {
        console.log(logMessage);
    }
}

buildElement('hi there', 'container-centered');
buildElement('my name is neil', 'container-centered');
buildElement('i am 47 years old', 'container-centered');
buildElement('i live in slane', 'container-centered');

log(arrayToString, 'error', 'hi there again', 'container');
log(shoppingList, 'warning');
log(shoppingList, null);

let myFruitList = function (fruit) {
    // do stuff;
}

myFruitList('orange');
myFruitList('apple');

function ask(question, yes, no) {
    if (confirm(question)) yes()
    else no();
}
// usage: functions showOk, showCancel are passed as arguments to ask
ask(
    "Do you agree?",
    function () {alert("You agreed.");},
    function () {alert("You cancelled.");});