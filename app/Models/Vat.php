<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function item(){
        return $this->hasMany(Item::class, 'vat_id');
    }
    
}
