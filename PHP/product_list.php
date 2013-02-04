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


foreach($products as $p) {
  // kihagyjuk ha -1
  if ($p->quantity == -1) {
    continue;
  }
  // kiirunk egy csillagot ha uj
  if($p->isNew){
    echo "* ";
  }
  // kiirjuk a termek nevet
  echo $p->name;

  // kiirjuk az arat
  echo " ";
  if ($p->actionPrice > 0 && $p->actionPrice < $p->price) {
    // ha van akcios ar es az kisebb mint az eladasi ar, akkor azt irjuk ki
    echo $p->actionPrice;
    echo " (-" . (100-(int)(($p->actionPrice/$p->price)*100)) . "%)";
  } else {
    // minden mas esetben a sima arat irjuk ki
    echo $p->price;
  }
  echo " ";
  
  // Kiirjuk, hogy van-e raktaron avagy sem
  echo "[";
  if ($p->quantity == 0) {
    echo "Rendelesre";
  } else {
    echo "Raktaron";
  }
  echo "]";
  

  // utunk a vegen egy entert
  echo "\n";
}
