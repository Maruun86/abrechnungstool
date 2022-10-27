<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'pin_needed', 'password_needed'];
    use HasFactory;


    /**
     * The users that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * The permissions that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,);
    }

        /**
     * Check for the specific role associated with the permission
     *
     * @param  App\Models $vendor
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasPermission($permission){
        return $this->permissions->contains($permission);
    }
}
