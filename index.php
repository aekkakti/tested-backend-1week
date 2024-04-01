<?php

class Human
{
    private static $count = 0;


    public function __construct()
    {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

$human1 = new Human();
$human2 = new Human();
$human3 = new Human();
echo 'Людей уже ' . Human::getCount();