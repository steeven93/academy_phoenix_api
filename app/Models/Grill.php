<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grill extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Scopes
     */

    public function scopeGetSpecificGrill($query, $count_number, $ref_number)
    {
        return $query->where('count_number', $count_number)->where('ref_number', $ref_number)->inRandomOrder();
    }
}
