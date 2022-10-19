<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rfid extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['rfid_nr'];
    use HasFactory;
   
   /**
    * Get the user that owns the Rfid
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function boundTo()
   {
        if($this->hasOne(Model::class) === Customer::class)
        {
            return $this->hasOne(Customer::class, 'rfid_id', 'id');
        }
        if($this->hasOne(Model::class) === User::class)
        {
            return $this->hasOne(User::class, 'rfid_id', 'id');
        }
   }
}
