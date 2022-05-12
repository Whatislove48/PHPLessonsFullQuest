<?php

require_once __DIR__ . '/item.php';

class Table extends Item   //   класс стол Table наследуется от Item
{                          //   стол потомок Item

    public int $legs;


    public function show()
    {
        return 'This is Table my parametrs: <br>'
            . 'LEGS = ' . $this->legs . '<br>'
            . parent::show();

    }



    /*
    public function show()
    {
        return 'Im - Tab this my parametrs'.'<br>'
            . $this->color.'<br>'
            . 'Legs = '.$this->legs.'<br>'
            . 'Prise = '.$this->price;
    }

    public function setPrice($price)
    {
        if ($price <= 0){
            echo 'ERROR';
            die;
        }
        $this->price = $price;
    }
*/
}

