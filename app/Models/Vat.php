<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    public $timestamps = false;
    protected $fillable = ['prozent_in_decimal'];
    use HasFactory;

      /**
     * Get all items associated with the VAT
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function items(){
        return $this->hasMany(Item::class, 'vat_id');
    }
    
}
