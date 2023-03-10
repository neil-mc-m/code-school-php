
let message_greeting = 'Hello!';

console.log(message_greeting);

message_greeting = 'goodbye';

console.log(message_greeting);


/*
    constants
*/
const message = 70;
const message2 = 100;

//console.log(message);

//message = 'goodbye!';

console.error(message + message2);

//

// let str = "Hello";
let str2 = 'Single quotes are ok too';
// let phrase = `can embed another ${str}`;

console.debug(str2.concat('ok', 'not ok'));

// embed an expression
//alert(`the result is ${1 + 2}`); // the result is 3

let age = 28;

console.log(age);

//alert(age);

let person = {
    name: "John",  // by key "name" store value "John"
    age: 30,
    dateOfBirth: function () {
        return new Date();
    },
    details: ['eyes', 'ears', 'hair']
};


let car = {
    brand: "Ford",  // by key "name" store value "John"
    year: 2011,
    color: 'black',
    weight: 1000,
    engineSize: 1600,
    upgrade: ['sunroof', 'stereo', 'heated seats'],
    price: 1000000,
    milesPerGallon: function (distance) {
        return this.engineSize * distance;
    }
};

console.log(car);

let fruitList = ['apples', 'oranges', 'bananas'];

let vegList = ['tomatoes', 'potatoes'];

let shoppingList = fruitList.concat(vegList.length);

// shoppingList.forEach((item, index, array) => {
//     alert(`${item} is at index ${index} in ${array}`);
// });

// type 1 = primitive types [strings, numbers, booleans, null, undefined]
// type 2 = complex types [objects, arrays]

