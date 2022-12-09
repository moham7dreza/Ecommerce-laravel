<?php

namespace App\Models\Market;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Share\Traits\HasFaDate;
use Share\Traits\hasLog;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasFaDate, HasLog;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'introduction', 'slug', 'image', 'status', 'tags', 'weight', 'length', 'width', 'height', 'price', 'marketable', 'sold_number', 'frozen_number', 'marketable_number', 'brand_id', 'category_id', 'published_at'];


    // relations
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function metas(): HasMany
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function colors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function guarantees(): HasMany
    {
        return $this->hasMany(Guarantee::class);
    }

    public function amazingSales(): HasMany
    {
        return $this->hasMany(AmazingSale::class);

    }

    public function values(): HasMany
    {
        return $this->hasMany(CategoryValue::class);
    }

    // methods
    public function activeAmazingSales()
    {
        return $this->amazingSales()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }

    public function activeComments()
    {
        return $this->comments()->where('approved', 1)->whereNull('parent_id')->get();
    }

    public function path(): string
    {
        return route('customer.market.product', $this->slug) ?? '#';
    }
}
