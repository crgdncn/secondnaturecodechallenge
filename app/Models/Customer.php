<?php

namespace App\Models;

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
}
