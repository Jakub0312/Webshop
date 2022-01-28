<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresstype extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
