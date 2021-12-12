<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevOrder extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function levorderrow()
    {
        return $this->hasMany(LevOrderRow::class);
    }
}
