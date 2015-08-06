<?php

namespace AppBundle\Model;

Class Food
{
    protected $taste;
    protected $price;
    protected $name;

    public function __construct($taste, $price, $name)
    {
        $this->taste = $taste;
        $this->price = $price;
        $this->name = $name;
    }

    public function getTaste()
    {
        return $this->taste;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

}
