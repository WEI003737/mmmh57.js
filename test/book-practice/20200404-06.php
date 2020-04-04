<?php
//1-1
$carrot = new ingredient;
$carrot -> food = "carrot";
$carrot -> price = "50";
class ingredient{
    public $food;
    public $price;
    function getPrice(){
         echo "Ingredient: ";
         echo $this -> food;
         echo "<br>";
         echo "Price: ";
         echo $this -> price;
    }
};
$carrot -> getPrice();
echo "<br>";
//1-2
class ingredient2{
    public $food;
    public $price;
    function __construct($food,$price){
        $this -> food = $food;
        $this -> price = $price;
    }
    function getPrice(){
        echo "Ingredient: ";
        echo $this -> food;
        echo "<br>";
        echo "Price: ";
        echo $this -> price;
        echo "<br>";
    }
    //重設價格
    function setPrice($price){
        $this -> price = $price;
    }
};
$onion = new ingredient2("onion","20");
$onion -> getPrice();
$carrot = new ingredient2("carrot","50");
$carrot -> getPrice();
$onion -> setPrice("80");
$onion -> getPrice();

//3 不會

?>
