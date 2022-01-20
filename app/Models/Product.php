<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'specifications', 'stock',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productstate()
    {
        return $this->belongsTo(Productstate::class);
    }

    public function picture()
    {
        return $this->hasMany(Picture::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }

    public function levorderrow()
    {
        return $this->hasMany(Levorderrow::class);
    }

    public function orderrow()
    {
        return $this->hasMany(OrderRow::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
