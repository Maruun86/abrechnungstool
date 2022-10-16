<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
   
    use HasFactory;

    protected $fillable = ['name', 'view_path'];
    public $timestamps = false;

    public function vendor(){
        return $this->hasMany(Vendor::class, 'layout_id');
    }
}
