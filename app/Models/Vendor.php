<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'layout_id'];
    public $timestamps = false;

    public function layout(){
        return $this->belongsTo(Layout::class, 'layout_id');
    }

    public function items(){
        return $this->belongsToMany(Items::class);
    }
}
