<?php

namespace App\Models;

use App\Models\ExpressionNumberCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressionNumber extends Model
{
    use HasFactory;
    protected $guard = [];

    public function scopeGetExpressionNumberDefault($query, $expression_number)
    {
        return $query->where('number', $expression_number)
        ->where('category_id', ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_DEFAULT)
        ->inRandomOrder();
    }

    public function scopeGetExpressionNumberExpression($query, $expression_number)
    {
        return $query->where('number', $expression_number)
        ->where('category_id', ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION)
        ->inRandomOrder();
    }

    public function scopeGetExpressionNumberSoul($query, $expression_number)
    {
        return $query->where('number', $expression_number)
        ->where('category_id', ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL)
        ->inRandomOrder();
    }

    public function scopeGetExpressionNumberPersonality($query, $expression_number)
    {
        return $query->where('number', $expression_number)
        ->where('category_id', ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY)
        ->inRandomOrder();
    }
}
