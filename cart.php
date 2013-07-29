<?php

function addItem ($itemID, $numb)
{
    if (!is_int($numb))
        return false;
    if (!isset($_COOKIE['cart']))
    {
        setcookie('cart', serialize(''));
        $items = unserialize($_COOKIE['cart']);
        assert(is_array($items));
        while ($numb > 0)
        {
            array_push($items, $itemID);
            $numb--;
        }
        setcookie('cart',serialize($items));
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
    if (!isset($_COOKIE['cart']))
        return false;
    else $items = unserialize($_COOKIE['cart']);
    assert(is_array($items));
    return $items;
}

function removeItem ($itemID)
{
    if (!isset($_COOKIE['cart']))
        return false;
    else
    {
        $items = unserialize($_COOKIE['cart']);
        assert(is_array($items));
        for ($i = 0; $i < sizeof($items); $i++)
        {
            if ($items[$i] == $itemID)
            {
                unset($items[$i]);
            }
        }
    $items = array_values($items);
    setcookie('cart', serialize($items));
    }
    return true;
}