<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'effdate'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pricetype()
    {
        return $this->belongsTo(PriceType::class);
    }
}
