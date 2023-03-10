### arrays

2 types of php array

a php array is a key/value list

- associative: we have control over the index
  (this relates to the index of the array)
['car' => 'volvo']

- numeric: index always starts at zero

['cars','boats']

### loops

loops are good for iterating through arrays

the foreach loop is best for arrays
there are 2 syntaxes when using this with arrays

foreach (array as value) {
    do something with value
}

foreach (array as key => value) {
    do something with value and key
}

### functions

function nameOfTheFunction () 
{
    function code in here;
    return values from functions;
}

call the function by using its name 
e.g  nameOfTheFunction();

function nameOfTheFunction (parameter list can be more than one here)
{
    function code in here;
    return values from functions;
}

nameOfTheFunction(the parameters);

### include

we can use include to copy/paste the included file into the current file

### how to check if a variable has a value

isset or empty

isset($variable) or empty($variable)