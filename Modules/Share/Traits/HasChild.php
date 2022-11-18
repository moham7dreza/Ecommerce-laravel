<?php

namespace Share\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasChild
{
    use HasRelationships;

    public static array $levels = [
        1 => 'منوی اصلی',
        2 => 'زیر منوی اصلی',
        3 => 'فرزند زیر منوی اصلی',
    ];

    //relations
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    // Methods
    public function getParent(): string
    {
        return is_null($this->parent_id) ? 'منوی اصلی' : $this->parent->name;
    }
}
