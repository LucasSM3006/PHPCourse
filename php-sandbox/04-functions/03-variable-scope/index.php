<?php

// Global space.
$name = "empty name";

function sayHello()
{
    // function scope. despite being in the same space, functions are unaware of global variables.
    // I assume this behaviour is due to the fact that you'd likely need to number variables in order to make things work
    // due to the loosely typed behaviour of the language. $number; outside and $number; inside would likely confuse things.
    // $name; //just typing this out means nothing. it'll actually cause an error and intelisense will warn you about it.
    
    $name = "yeah";
    echo $name;
    echo "<br />";
    // to access the "name" variable in the global space
    // not a great practice, but it's available to use
    global $name;
    // changing it in here is reflected on the global space as well.
    $name = "new name";
    echo $name;
}

echo sayHello(); // of course, prints out 'yeah'.
echo "<br />";
echo $name; // prints out value held up top.