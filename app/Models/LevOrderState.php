<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevOrderState extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function levorderrow()
    {
        return $this->hasMany(LevOrderRow::class);
    }
}
