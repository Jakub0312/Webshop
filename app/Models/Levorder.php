<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levorder extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function levorderrow()
    {
        return $this->hasMany(Levorderrow::class);
    }
}
