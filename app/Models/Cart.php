<?php

namespace App\Models;
class Cart
{
    public $items = null;
    public $totalAmount = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalAmount = $oldCart->totalAmount;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItems = ['amount' => 0, 'price' => $item->latest_price->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItems = $this->items[$id];
            }
        }
        $storedItems['amount']++;
        $storedItems['price'] = $item->latest_price->price * $storedItems['amount'];
        $this->items[$id] = $storedItems;
        $this->totalAmount++;
        $this->totalPrice += $item->latest_price->price;
    }
}
