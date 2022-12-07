<?php

namespace Share\Traits;

use App\Models\Content\Comment;
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
        return $this->comments()->where([['approved', Comment::APPROVED]
            , ['status', Comment::STATUS_ACTIVE]])->whereNull('parent_id');
    }
}
