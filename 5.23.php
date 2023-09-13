<?php

$object = new Subscriber;
$object->name = "Fred";
$object->password = "12345";
$object->phone = "+7902";
$object->email = "Fr@ed.rt";
$object->display();

class User
{
    public $name, $password;

    function save_user()
    {
        echo "Сохранили";
    }
}

class Subscriber extends User
{
    public $phone, $email;

    function display()
    {
        echo "Name: " .$this->name . "</br>";
        echo "Pass: " . $this->password ."</br>";
        echo "phone: " . $this->phone ."</br>";
        echo "email: " . $this->email ."</br>";
    }
}
