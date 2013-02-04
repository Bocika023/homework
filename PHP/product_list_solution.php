<?php
// szard le
require_once('product.php');

// termekek kikerdezese
$products = getActiveProducts();

// irassuk ki a kepernyore a termekek nevet
// legyen elotte egy * amennyiben uj termekrol van szo
// mellette legyen ott az ara
// az ara a price, ha az actionprice nem nulla akkor
// ha kisebb mint a price irjuk ki azt arkent es irjuk
// ki melle zarojelben, hogy mennyi szazalek kedvezmeny
// a sor vegen legyen ott, hogy van-e raktaron vagy
// sem (Raktaron illetve Rendelesre szoveg szogletes zarojelben)
// Ha a quantity -1 akkor ne is jelenjen meg a termek
//
// A termek adatainak nevei a product.php-ban van.
//
// A program kimenete ez kell, hogy legyen:
//   Termek 0 12500 [Raktaron]
//   Termek 1 16000 (-17%) [Raktaron]
//   * Termek 2 14235 [Raktaron]
//   Termek 3 55321 [Raktaron]
//   Termek 4 12334 [Rendelesre]
//   Termek 5 51123 [Raktaron]
//   Termek 6 6300 (-56%) [Raktaron]
//   Termek 7 12443 [Rendelesre]
//   * Termek 9 43423 (-21%) [Raktaron]
//   * Termek 10 43421 (-56%) [Raktaron]
//   Termek 11 1221 [Raktaron]
//   Termek 12 442 [Raktaron]

foreach($products as $product) {
  if ($product->quantity < 0) {
    continue;
  }
  if ($product->isNew) {
    echo "* ";
  }
  echo $product->name;
  echo " ";
  if ($product->actionPrice > 0 && $product->actionPrice < $product->price) {
    echo $product->actionPrice;
    echo " (-" . (100-(int)($product->actionPrice/$product->price*100)) . "%)";
  } else {
    echo $product->price;
  }
  echo " ";
  echo "[";
  if ($product->quantity > 0) {
    echo "Raktaron";
  } else {
    echo "Rendelesre";
  }
  echo "]\n";
}
