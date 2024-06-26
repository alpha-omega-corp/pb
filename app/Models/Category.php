<?php

namespace App\Models;

use App\Enums\CategoryType;
use App\Traits\HasLangScope;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Category extends Model
{
    use HasFactory;
    use HasLangScope;

    public $timestamps = false;

    protected $fillable = [
        'service',
    ];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function locale(): MorphOne
    {
        return $this->morphOne(CategoryLocale::class, 'translatable');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(CategoryTag::class, 'category_id', 'id');
    }

    public function scopeOfType(Builder $query, CategoryType $type): void
    {
        $query->where('service', $type->value);
    }
}
