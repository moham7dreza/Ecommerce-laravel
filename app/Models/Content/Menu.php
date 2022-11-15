<?php

namespace App\Models\Content;

use App\Models\Market\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    public static array $levels = [
        1 => 'منوی اصلی',
        2 => 'زیر منوی اصلی',
        3 => 'فرزند زیر منوی اصلی',
    ];

    public static array $locations = [
        1 => 'فروشگاه - صفحه اصلی',
        2 => 'آیتی سیتی',
        3 => 'دنیای دیجیتالی',
    ];

    protected $casts = ['image' => 'array'];

    protected $guarded = ['id'];

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
        return $this->belongsTo(ProductCategory::class);
    }

    // Methods
    public function getParent(): string
    {
        if (is_null($this->parent_id)) return 'ندارد';

        return $this->parent->name;
    }
}
