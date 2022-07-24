<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $dates = ['birthday', 'created_at', 'updated_at'];
    protected $casts = [
        'birthday'  =>  'date'
    ];
    /**
     * Get all of the notes for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    /**Scopes
     *
     */

     public function scopeCustomeruser($query, $user_id)
     {
        return $query->where('user_id', $user_id);
     }
}
