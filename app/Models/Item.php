<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'preis', 'vat_id'];
    use HasFactory;

    /**
     * Get the vat associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vat(){
        return $this->belongsTo(Vat::class, 'vat_id');
    }
    /**
     * Get all vendors associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vendors(){
        return $this->belongsToMany(Vendor::class);
    }
    /**
     * Check for the specific vendor associated with the Item
     *
     * @param  App\Models $vendor
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasVendor($vendor){
        return $this->vendors->contains($vendor);
    }
}
