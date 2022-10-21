<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'layout_id'];
    public $timestamps = false;

      /**
     * Get the layout associated with the Vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layout(){
        return $this->belongsTo(Layout::class, 'layout_id');
    }

      /**
     * Get all items associated with the Vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function items(){
        return $this->belongsToMany(Item::class);
    }

    /**
     * Get all of the users for the Vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {

        return $this->hasMany(User::class);
    }

    public function hasUserWithActiveEvent($event)
    {
        $users = $this->users;
        foreach ($users as $user) {
            if($user->events->contains($event))
            {
                return true;
            }
        }
       
        return false;
    }
}