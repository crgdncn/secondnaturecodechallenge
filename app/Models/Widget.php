<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'name', 'description', 'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Customers that have this widget
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany | Illuminate\Database\Eloquent\Collection
     */
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    /**
     * List all active models
     *
     * @return  Collection
     */
    public static function active()
    {
        return static::where('active', '=', true)->get();
    }

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', '=', true);
    }
}
