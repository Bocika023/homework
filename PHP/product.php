<?php
class Product {
  public $name = "";
  public $quantity = 0;
  public $isNew = false;
  public $price = 0;
  public $actionPrice = 0;

  public function __construct($name, $quantity, $isNew, $price, $actionPrice) {
    $this->name = $name;
    $this->quantity = $quantity;
    $this->isNew = $isNew;
    $this->price = $price;
    $this->actionPrice = $actionPrice;
  }
}

function getActiveProducts() {
  $plist = array(
    new Product('Termek 0',  2,   false, 12500, 0),
    new Product('Termek 1',  5,   false, 19200, 16000),
    new Product('Termek 2',  15,  true,  14235, 0),
    new Product('Termek 3',  8,   false, 55321, 0),
    new Product('Termek 4',  0,   false, 12334, 0),
    new Product('Termek 5',  23,  false, 51123, 0),
    new Product('Termek 6',  11,  false, 14114, 6300),
    new Product('Termek 7',  0,   false, 12443, 0),
    new Product('Termek 8',  -1,  false, 23443, 0),
    new Product('Termek 9',  120, true,  54534, 43423),
    new Product('Termek 10', 12,  true,  97128, 43421),
    new Product('Termek 11', 4,   false, 1221,  0),
    new Product('Termek 12', 9,   false, 442,   0)
  );

  return $plist;
}
