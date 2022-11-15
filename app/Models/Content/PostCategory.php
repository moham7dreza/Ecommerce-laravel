<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class PostCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

//    protected $fillable = ['name', 'description', 'slug', 'image', 'status', 'tags'];

    protected $guarded = ['id'];

    //relations
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Methods
    public function path(): string
    {
        return route('digital-world.category.posts', $this->slug);
    }

    public function getParent(): string
    {
        if (is_null($this->parent_id)) return 'ندارد';

        return $this->parent->name;
    }

}
