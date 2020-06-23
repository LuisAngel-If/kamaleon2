<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artist;

class Product extends Model
{
    //products->technique
   public function technique()
   {
       return $this->belongsTo(Technique::class);
   }

   public function genre()
   {
       return $this->belongsTo(Genre::class);
   }

   public function artist()
   {
       return $this->belongsTo(Artist::class);
   }

   public function type()
   {
       return $this->belongsTo(Type::class);
   }
}
