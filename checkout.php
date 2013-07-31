<?php
session_start();
$connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
mysql_select_db("c43726") or die("Cannot select DB");
if (!isset($_POST['cancel']))
{
$sql = "SELECT * FROM ORDERS";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
$id = $rows + 1;
$username = $_SESSION['username'];
$order = $_COOKIE['cart'];
$cost = $_POST['cost'];
$sql = "INSERT INTO orders VALUES ('$id','$order','$username','$cost');";
$result = mysql_query($sql);
setcookie("cart", "", time()-3600);
header ("location: cart.php");
}
else  {
    setcookie("cart", "", time()-3600);
    header ("location: cart.php");
}
