<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressionNumberCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    const EXPRESSION_NUMBER_CATEGORY_DEFAULT = 1;
    const EXPRESSION_NUMBER_CATEGORY_DEFAULT_NAME = 'DEFAULT';

    const EXPRESSION_NUMBER_CATEGORY_EXPRESSION = 2;
    const EXPRESSION_NUMBER_CATEGORY_EXPRESSION_NAME = 'EXPRESSION';

    const EXPRESSION_NUMBER_CATEGORY_SOUL = 3;
    const EXPRESSION_NUMBER_CATEGORY_SOUL_NAME = 'SOUL';

    const EXPRESSION_NUMBER_CATEGORY_PERSONALITY = 4;
    const EXPRESSION_NUMBER_CATEGORY_PERSONALITY_NAME = 'PERSONALITY';
}
