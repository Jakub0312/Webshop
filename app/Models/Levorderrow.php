<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levorderrow extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'expected'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function levorder()
    {
        return $this->belongsTo(Levorder::class);
    }

    public function levorderstate()
    {
        return $this->belongsTo(Levorderstate::class);
    }
}
