<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const STATUS_NEW = 2;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_NEW];

    protected $fillable = ['body', 'parent_id', 'author_id', 'commentable_id', 'commentable_type', 'approved', 'status'];


    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }


}
