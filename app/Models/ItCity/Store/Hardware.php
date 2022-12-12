<?php

namespace App\Models\ItCity\Store;

use App\Models\Market\Brand;
use App\Models\Market\Guarantee;
use App\Models\Market\ProductCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;
use Share\Traits\HasComments;
use Share\Traits\HasFaDate;

class Hardware extends Model implements Viewable
{
    use HasFactory, SoftDeletes, Sluggable, HasComments, HasFaDate, Likeable, InteractsWithViews, Favoriteable;

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

    protected $table = 'products';

    protected $guarded = ['id'];

    // Relations
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function guarantees(): HasMany
    {
        return $this->hasMany(Guarantee::class);
    }

    // Methods
    public function path(): string
    {
        return route('it-city.store.hardware', $this->slug);
    }

    public function commentsCount(): int
    {
        return $this->activeComments()->count();
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

    public function limitedName(): string
    {
        return Str::limit($this->name, 50);
    }

    public function getFaPrice(): string
    {
        return priceFormat($this->price) . ' تومان ';
    }

    public function textCategoryName(): string
    {
        return $this->category->name ?? 'دسته ندارد';
    }
}
