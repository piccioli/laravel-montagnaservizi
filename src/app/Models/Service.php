<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_slug',
        'slug',
        'title',
        'subtitle',
        'description',
        'body',
        'sort_order',
    ];

    public function scopeForCategory(Builder $query, string $categorySlug): Builder
    {
        return $query->where('category_slug', $categorySlug)->orderBy('sort_order');
    }
}
