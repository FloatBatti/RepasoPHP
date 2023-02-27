<?php 

namespace Models;


class Order{

    private $orderId;
    private $orderStatusId;
    private $description; 
    private $price;

    public function __construct($orderId=null, $orderStatusId=null, $description=null, $price=null)
    {
        $this->orderId = $orderId;
        $this->orderStatusId = $orderStatusId;
        $this->description = $description;
        $this->price = $price;
    }

    
    public function getOrderId()
    {
        return $this->orderId;
    }


    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderStatusId()
    {
        return $this->orderStatusId;
    }

    public function setOrderStatusId($orderStatusId)
    {
        $this->orderStatusId = $orderStatusId;

    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}





?>