<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pin',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the events for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

        /**
     * Check for the specific user associated with the Event
     *
     * @param  App\Models $vendor
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasEvent($event){
        return $this->events->contains($event);
    }

    /**
     * Get the Role associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the vendor associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

     /**
     * Is the current event active for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasActiveEvent($event)
    {
       if( $this->events->contains($event))
       {
        return $event->event_running;
      }
    }

}
