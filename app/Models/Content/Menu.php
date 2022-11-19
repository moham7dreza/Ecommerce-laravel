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

    public const LOCATION_CUSTOMER = 1;
    public const LOCATION_IT_CITY = 2;
    public const LOCATION_DIGITAL_WORLD = 3;

    public const LEVEL_MAIN_MENU = 1;
    public const LEVEL_SUB_MENU = 2;
    public const LEVEL_SUB_MENU_CHILD = 3;

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

    // relations
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
    public function textParentName(): string
    {
        return is_null($this->parent_id) ? 'منوی اصلی' : $this->parent->name;
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function setLevel(): int
    {
        return is_null($this->parent_id) ? self::LEVEL_MAIN_MENU : self::LEVEL_SUB_MENU;
    }

    public function textCategoryName(): string
    {
        return $this->category->name ?? 'دسته ندارد';
    }

    public function getFaCreatedDate(): string
    {
        return jalaliDate($this->created_at);
    }

    public function getFaUpdatedDate(): string
    {
        return jalaliDate($this->updated_at);
    }
}
