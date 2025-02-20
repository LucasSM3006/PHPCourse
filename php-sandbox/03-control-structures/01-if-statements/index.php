<?php
$age = 40;
$name = "john bush";
// If statement
if($age >= 21)
{
echo "can drink";
};
// If-Else

if($age >= 21)
{
echo "can drink";
}
else
{
echo "cannot drink";
}

// Nested if statement

if($age >= 21)
{
    if($name == "john bush")
    {
        echo "hello bush";
    }
echo "can drink";
}
else if ($age >= 18)
{
echo "can drink at least";
}
else
{
    echo "youre a minor";
}

// If-Else-If

if($age > 20)
{

}
else if ($age >= 18)
{
echo "can drink at least";
}
else
{
    echo "youre a minor";
}