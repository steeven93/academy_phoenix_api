<?php

namespace App\Models;

use App\Models\Alfabet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlfabetValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeGetCharacterValue($query, $character, $alfabet_id = Alfabet::ALFABET_DEFAULT_LANGUAGE)
    {
        return $query->where('char', $character)->where('alfabet_id', $alfabet_id);
    }
}
