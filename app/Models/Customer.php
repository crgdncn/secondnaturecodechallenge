<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Widget;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at',
    ];

    protected $casts = [
        'admin' => 'boolean',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }

    /**
     * Widgets associated with this customer
     * @return @return Illuminate\Database\Eloquent\Relations\BelongsToMany | Illuminate\Database\Eloquent\Collection
     */
    public function widgets()
    {
        return $this->belongsToMany(Widget::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function makeAdmin()
    {
        $this->admin = true;
        $this->save();
    }

    public function removeAdmin()
    {
        $this->admin = false;
        $this->save();
    }
}
