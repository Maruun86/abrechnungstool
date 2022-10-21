<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'start_date', 'end_date', "cash_pay", "event_running" ];
    /**
     * Get all of the historys for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historys()
    {
        return $this->hasMany(History::class);
    }

    /**
     * Get all of the protokolls for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protokolls()
    {
        return $this->hasMany(Protokoll::class);
    }
    
    /**
     * Get all of the users for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function isActive()
    {
        return $this->event_running;
    }
}
