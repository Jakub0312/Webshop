<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'price_types';

//    public function price()
//    {
//        return $this->hasMany(Price::class);
//    }
}
