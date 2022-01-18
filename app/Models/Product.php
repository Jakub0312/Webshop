<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'specifications', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function productstate()
//    {
//        return $this->belongsTo(Productstate::class);
//    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }

    public function orderrow()
    {
        return $this->hasMany(OrderRow::class);
    }

}
