<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name_en',
        'category_name_ind',
        'category_slug_end',
        'category_slug_ind',
        'category_icon',
    ];
}
