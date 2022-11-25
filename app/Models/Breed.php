<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $guarded = [];

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }
}
