<?php
session_start();
function addItem ($itemID, $numb)
{
    if (!isset($_COOKIE['cart']))
    {
        setcookie('cart', serialize(''));
        while ($numb > 0)
        {
            $items = unserialize($_COOKIE['cart']);
            assert(is_array($items));
            array_push($items, $itemID);
            $numb--;
        }
    }
    else
    {
        $items = unserialize($_COOKIE['cart']);
        assert(is_array($items));
        while ($numb > 0)
        {
            array_push($items, $itemID);
            $numb--;
        }
        setcookie('cart', serialize($items));
    }
    return true;
}

function getItems ()
{
    if (!isset($_COOKIE['shoppingcart']))
        return -1;
    else $items[] = explode(',', $_COOKIE['cart']);
    return $items;
}

function removeItem ($itemID, $numb)
{
    if (!isset($_COOKIE['shoppingcart']))
        return -1;
    else
    {
        $items = unserialize($_COOKIE['cart']);
        assert(is_array($items));
        for ($i = 0; $i < sizeof($items); $i++)
        {
            if ($items[$i] == $itemID && $numb > 0)
            {
                unset($items[$i]);
                $numb--;
            }
        }
    $items = array_values($items);
    setcookie('cart', serialize($items));
    }
    return true;
}