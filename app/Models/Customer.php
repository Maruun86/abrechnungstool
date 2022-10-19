<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = ['vorname', 'nachname', 'email', 'rfid_id', 'active'];
    use HasFactory;
    
    public function rfid()
    {
        return $this->hasOne(RFID::class,'id');
    }
}
