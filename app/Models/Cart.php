<?php

namespace App\Models;
class Cart
{
    public $items = null;
    public $totalAmount = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) { //als oude cart bestaat haalt die alle gegevens van die cart op, bestaat die niet wordt die aangemaakt
            $this->items = $oldCart->items;
            $this->totalAmount = $oldCart->totalAmount;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($product, $id)
    {
        $storedItems = ['amount' => 0, 'price' => $product->latest_price->price, 'item' => $product]; //voor elk product wordt de amount en de prijs eerst op 0 gezet en het item als het product
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItems = $this->items[$id];
            }
        }
        $storedItems['amount']++; //amount +1
        $storedItems['price'] = $product->latest_price->price * $storedItems['amount']; // price * amount voor totale prijs
        $this->items[$id] = $storedItems;
        $this->totalAmount++;
        $this->totalPrice += $product->latest_price->price;


    }

    public function remove($id) {

        if(!$this->items || !isset($this->items[$id])) { //als er geen items zijn of de variabele wordt niet gevonden wordt false gereturned (hoeven we wss niks mee te doen)
            return false;
        }
        $this->totalAmount -= $this->items[$id]['amount'];
        $this->totalPrice -=  $this->items[$id]['price'] * $this->items[$id]['amount'];

        // and remove the item
        unset($this->items[$id]);
    }
}
