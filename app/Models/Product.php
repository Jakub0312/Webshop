<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['name', 'description', 'specifications', 'stock',];
=======
    protected $fillable = ['name', 'description', 'specifications', 'stock', 'price'];
>>>>>>> develop

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productstate()
    {
        return $this->belongsTo(Productstate::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }

    public function latest_price()
<<<<<<< HEAD
    {
        return $this->hasOne(Price::class)->orderBy('effdate', 'desc');
    }

    public function levorderrow()
=======
>>>>>>> develop
    {
        return $this->hasOne(Price::class)->orderBy('effdate', 'desc');
    }

    public function orderrow()
    {
        return $this->hasMany(OrderRow::class);
    }

}
