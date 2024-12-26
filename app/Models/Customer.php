<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Make sure to include the name field in fillable.

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

