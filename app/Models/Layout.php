<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
   
    use HasFactory;

    protected $fillable = ['name', 'view_path'];
    public $timestamps = false;

      /**
     * Get all vendors associated with the Layout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vendors(){
        return $this->hasMany(Vendor::class, 'layout_id');
    }
}
