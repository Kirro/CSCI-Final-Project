<?php
$connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
mysql_select_db("c43726") or die("Cannot select DB");
function addItem ($itemID, $numb)
{
    $cookie = "";
    if($numb <= 0)
        return false;
    $string = $itemID;
    $numb--;
    while ($numb > 0)
    {
        $string = $string.','.$itemID;
        $numb--;
    }
    if (!isset($_COOKIE['cart']))
    {
        setcookie('cart', $string);
        echo "Unset";
    }
    else
    {
        $cookie = $_COOKIE['cart'];
        echo "Set";
        $items = $cookie.",".$string;
        setcookie('cart', $items);
    }
    echo "<br>Cookie: ".$cookie;
    return true;
}

function removeItem ($itemID)
{

}

$itemID = $_POST['itemID'];
$numb = $_POST['numb'];

addItem($itemID,$numb);
header ("location: cart.php");