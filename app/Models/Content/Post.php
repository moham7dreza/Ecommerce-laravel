<?php

namespace App\Models\Content;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Modules\Share\Enums\PostStatus;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;
use Share\Traits\HasComments;
use Share\Traits\HasFaDate;
use Spatie\Tags\HasTags;

class Post extends Model implements Viewable
{
    use HasFactory, SoftDeletes, Sluggable, HasComments,
        HasFaDate, Likeable, InteractsWithViews, Favoriteable, HasTags;

//    protected $casts = ['status' => PostStatus::class];

    public const STATUS_ACTIVE = 1;
    public const STATUS_PENDING = 2;
    public const STATUS_INACTIVE = 0;

    public const ADMIN_SELECTED = 1;
    public const ADMIN_UNSELECT = 0;

    public const IS_BREAKING_NEWS = 1;
    public const NOT_BREAKING_NEWS = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_PENDING, self::STATUS_INACTIVE];

    public const TYPE_VIP = '1';
    public const TYPE_NORMAL = '0';
    public const TYPE_SELECTED = '2';
    public const TYPE_BREAKING_NEWS = '3';

    public static array $types = [self::TYPE_VIP, self::TYPE_NORMAL, self::TYPE_SELECTED, self::TYPE_BREAKING_NEWS];

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
    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
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

    public function imagePath(): string
    {
        return asset($this->image['indexArray']['medium']);
    }

    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function limitedTitle(): string
    {
        return Str::limit($this->title, 50);
    }

    public function limitedSummary(): string
    {
        return Str::limit($this->summary, 150);
    }

    public function limitedBody(): string
    {
        return Str::limit($this->body, 150);
    }

    public function textCategoryName(): string
    {
        return $this->category->name ?? 'دسته ندارد';
    }

    public function getCategoryPath(): string
    {
        return $this->category->path();
    }

    public function textAuthorName(): string
    {
        return $this->author->fullName ?? 'نویسنده ندارد.';
    }

    public function getAuthorPath(): string
    {
        return $this->author->path();
    }

    public function authorImage(): string
    {
        return $this->author->image() ?? 'عکس ندارد.';
    }

    // Counters

    public function likersCount(): int
    {
        return $this->likers()->count();
    }

    public function favoritersCount(): int
    {
        return $this->favoriters()->count();
    }

    public function commentsCount(): int
    {
        return $this->activeComments()->count();
    }
}
