<?php
abstract class HumanAbstract
{
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract public function getGreetings();
    abstract public function getMyNameIs();

    public function introduceYourself()
    {
        return $this->getGreetings() . "! " .$this->getMyNameIs() . " " . $this->getName() . ".";
    }
}

class RussianHuman extends HumanAbstract
{
    public function getGreetings()
    {
        return 'Привет';
    }

    public function getMyNameIs()
    {
        return 'Меня зовут';
    }
}

class EnglishHuman extends HumanAbstract
{

    public function getGreetings()
    {
        return 'Hello';
    }

    public function getMyNameIs()
    {
        return 'My name is ';
    }
}

$russian = new RussianHuman("Олег");
$english = new EnglishHuman("Oleg");

echo $russian->introduceYourself()."<br>";
echo $english->introduceYourself()."<br>";