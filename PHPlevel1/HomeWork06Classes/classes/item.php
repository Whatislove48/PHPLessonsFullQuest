<?php



class Item
{
    protected $price;
    protected $color;

    public function __construct($price,$color)
    {
        $this->price = $price;
        $this->color = $color;
    }


    public function show()
    {
        return  'Price = ' . $this->price. ' Rubles'.'<br>'
            .'Color = '. $this->color;
    }

}