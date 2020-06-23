<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    //technique -> produts
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //php artisan tinker
}
