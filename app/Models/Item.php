<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'preis', 'vat_id'];
    use HasFactory;

    public function vat(){
        return $this->belongsTo(Vat::class, 'vat_id');
    }

    public function vendors(){
        return $this->belongsToMany(Vendor::class);
    }
}
