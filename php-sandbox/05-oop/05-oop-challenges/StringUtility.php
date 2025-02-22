<?php

class StringUtility
{
    public static function shout($string)
    {
        return strtoupper($string . "!");
    }

    public static function whisper($string)
    {
        return strtolower($string . ".");
    }

    public static function repeat($string, $times = 2)
    {
        return str_repeat($string, $times);
    }
}

echo StringUtility::shout("no longer lowercase");
echo "<br />";
echo StringUtility::whisper("NO LONGER UPPERCASE");
echo "<br />";
echo StringUtility::repeat("repetitive string", 10);
echo "<br />";