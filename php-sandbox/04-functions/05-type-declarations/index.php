<?php

declare(strict_types = 1); // Turns strict types on.

function get_sum(int $a, int $b): int
{
    return $a+$b;
}

function upperCaseString(string $string): string
{
    return strtoupper($string);
}

function returnsNothing(): void
{
    echo "still doesn't return anything";
}

echo get_sum(1,2);
// echo upperCaseString(1); // Doesn't work.
echo upperCaseString("String moment");