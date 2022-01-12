<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productstate extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    //protected $table = "product_states";

//    public function product()
//    {
//        return $this->hasMany(Product::class);
//    }
}
