<?php

namespace Share\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    use HasRelationships;

    public function comments(): MorphMany
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }

    public function activeComments(): MorphMany
    {
        return $this->comments()->where('approved', 1)->whereNull('parent_id');
    }
}
