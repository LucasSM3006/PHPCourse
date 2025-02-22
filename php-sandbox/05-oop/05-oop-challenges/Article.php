<?php

class Article
{
    public $title;
    public $content;
    private $published = false;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function publish()
    {
        $this->published = true;
    }

    public function isPublished()
    {
        return $this->published;
    }
}

$article1 = new Article("Top 10 PHP String Functions!","1. strlen, 2. implode, 3. explode, 4...");
$article2 = new Article("C#: The Masterclass.","Functions, OOP, Garbage Collection, Compiler, Multithreading...");

$article1->publish();

echo $article1->isPublished() ? "Published." : "Not published.";
echo "<br />";
echo $article2->isPublished() ? "Published." : "Not published.";