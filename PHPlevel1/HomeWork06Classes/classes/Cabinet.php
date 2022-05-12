<?php

require_once __DIR__ . '/item.php';


class Cabinet extends Item
{

    public $doors;

    public function show()
    {
        return 'This is Cabinet my parametrs: <br>'
            . 'DOORS = ' . $this->doors . '<br>'
            . parent::show();

    }

}