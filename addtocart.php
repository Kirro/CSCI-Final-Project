<?php
include 'cart.php';

$itemID = $_POST['itemID'];
$numb = $_POST['numb'];

addItem($itemID,$numb);