<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevOrderRow extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'expected'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function levorder()
    {
        return $this->belongsTo(LevOrder::class);
    }

    public function levorderstate()
    {
        return $this->belongsTo(LevOrderState::class);
    }
}
