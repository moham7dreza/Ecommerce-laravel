<?php

namespace App\Models\Content;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Share\Traits\HasComments;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasComments;

    public const STATUS_ACTIVE = 1;
    public const STATUS_PENDING = 2;
    public const STATUS_INACTIVE = 0;

    public const ADMIN_SELECTED = 1;
    public const ADMIN_UNSELECT = 0;

    public const IS_BREAKING_NEWS = 1;
    public const NOT_BREAKING_NEWS = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_PENDING, self::STATUS_INACTIVE];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

//    protected $fillable = ['title', 'summary', 'slug', 'image', 'status', 'tags', 'body', 'published_at', 'author_id', 'category_id', 'commentable'];
    protected $guarded = ['id'];

    // Relations
    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Methods
    public function path(): string
    {
        return route('digital-world.post.detail', $this->slug);
    }

    public function commentsCount(): int
    {
        return $this->activeComments()->count();
    }
}
