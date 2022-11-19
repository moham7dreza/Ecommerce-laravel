<?php

namespace App\Models\ItCity\Store;

use App\Models\Market\Brand;
use App\Models\Market\ProductCategory;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Share\Traits\HasComments;

class Service extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasComments;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public const SERVICE_AVAILABLE = 1;
    public const SERVICE_UN_AVAILABLE = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];


    // Relations
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Methods
    public function path(): string
    {
        return route('it-city.service.detail', $this->slug);
    }

    public function commentsCount(): int
    {
        return $this->activeComments()->count() ?? 0;
    }

    public function imagePath(): string
    {
        return asset($this->image['indexArray']['medium']) ?? '#';
    }

    public function textParentName(): string
    {
        return is_null($this->parent_id) ? 'سرویس اصلی' : $this->parent->name;
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function textCategoryName(): string
    {
        return $this->category->name ?? 'دسته ندارد';
    }

    public function textBrandName(): string
    {
        return $this->brand->persian_name ?? 'برند ندارد';
    }

    public function textServiceAvailability(): string
    {
        return $this->service_availability == self::SERVICE_AVAILABLE ? 'قابل سرویس دهی' : 'غیر قابل سرویس';
    }

    public function cssServiceAvailability(): string
    {
        if ($this->service_availability === self::SERVICE_AVAILABLE) return 'success';
        else if ($this->service_availability === self::SERVICE_UN_AVAILABLE) return 'danger';
        else return 'warning';
    }

    public function getFaPrice(): string
    {
        return priceFormat($this->price) . ' تومان ';
    }

    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function limitedDescription(): string
    {
        return Str::limit($this->description, 50) ?? 'توضیحات ندارد';
    }

    public function getFaCreatedDate(): string
    {
        return jalaliDate($this->created_at) ?? 'تاریخی ثبت نشده است';
    }

    public function getFaUpdatedDate(): string
    {
        return jalaliDate($this->updated_at)?? 'تاریخی ثبت نشده است';
    }
}
