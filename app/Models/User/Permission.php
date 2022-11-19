<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    public const PERMISSION_SUPER_ADMIN = ['name' => 'permission-super-admin', 'description' => 'مدیر ارشد سیستم - دسترسی نامحدود'];
    public const PERMISSION_IT_CITY_PANEL = ['name' => 'permission-it-city-panel', 'description' => 'دسترسی به پنل مدیریت بخش آیتی سیتی'];
    public const PERMISSION_CUSTOMER_PANEL = ['name' => 'permission-customer-panel', 'description' => 'دسترسی به پنل مدیریت بخش مشتری'];
    public const PERMISSION_ADMIN_TO_PANEL = ['name' => 'permission-admin-to-panel', 'description' => 'دسترسی به پنل مدیریت بخش دنیای دیجیتالی'];
    public const PERMISSION_POST_CATEGORIES = ['name' => 'permission-post-categories', 'description' => 'دسترسی به بخش دسته بندی پست ها'];
    public const PERMISSION_POSTS = ['name' => 'permission-posts', 'description' => 'دسترسی به بخش پست ها'];
    public const PERMISSION_MARKET = ['name' => 'permission-market', 'description' => 'دسترسی به بخش فروش'];
    public const PERMISSION_CONTENT = ['name' => 'permission-content', 'description' => 'دسترسی به بخش محتوا'];
    public const PERMISSION_PRODUCTS = ['name' => 'permission-products', 'description' => 'دسترسی به بخش محصولات'];
    public const PERMISSION_PRODUCT_CATEGORIES = ['name' => 'permission-product-categories', 'description' => 'دسترسی به بخش دسته بندی محصولات'];
    public const PERMISSION_WAREHOUSE = ['name' => 'permission-warehouse', 'description' => 'دسترسی به بخش انبار محصول'];
    public const PERMISSION_PRODUCT_COMMENTS = ['name' => 'permission-product-comments', 'description' => 'دسترسی به بخش نظرات محصول'];
    public const PERMISSION_PRODUCT_PROPERTY = ['name' => 'permission-product-property', 'description' => 'دسترسی به بخش فرم کالا'];
    public const PERMISSION_ORDERS = ['name' => 'permission-orders', 'description' => 'دسترسی به بخش سفارشات'];
    public const PERMISSION_PAYMENTS = ['name' => 'permission-payments', 'description' => 'دسترسی به بخش پرداخت ها'];
    public const PERMISSION_DISCOUNT = ['name' => 'permission-discount', 'description' => 'دسترسی به بخش تخفبف ها'];
    public const PERMISSION_DELIVERY_METHODS = ['name' => 'permission-delivery-methods', 'description' => 'دسترسی به بخش روش های ارسال کالا'];
    public const PERMISSION_POST_COMMENTS = ['name' => 'permission-post-comments', 'description' => 'دسترسی به بخش نظرات پست'];
    public const PERMISSION_MENUS = ['name' => 'permission-menus', 'description' => 'دسترسی به بخش منوها'];
    public const PERMISSION_FAQS = ['name' => 'permission-faqs', 'description' => 'دسترسی به بخش سوالات متداول'];
    public const PERMISSION_BANNERS = ['name' => 'permission-banners', 'description' => 'دسترسی به بخش بنرها و تبلیغات'];
    public const PERMISSION_USERS = ['name' => 'permission-users', 'description' => 'دسترسی به بخش کاربران'];
    public const PERMISSION_TICKETS = ['name' => 'permission-tickets', 'description' => 'دسترسی به بخش تیکت ها'];
    public const PERMISSION_NOTIFY = ['name' => 'permission-notify', 'description' => 'دسترسی به بخش اطلاع رسانی'];
    public const PERMISSION_SETTING = ['name' => 'permission-setting', 'description' => 'دسترسی به بخش تنطیمات سایت'];
    public const PERMISSION_POST_AUTHORS = ['name' => 'permission-authors', 'description' => 'دسترسی به بخش نویسندگان پست ها'];

    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_POST_CATEGORIES,
        self::PERMISSION_POSTS,
        self::PERMISSION_MARKET,
        self::PERMISSION_CONTENT,
        self::PERMISSION_PRODUCTS,
        self::PERMISSION_PRODUCT_CATEGORIES,
        self::PERMISSION_WAREHOUSE,
        self::PERMISSION_PRODUCT_COMMENTS,
        self::PERMISSION_PRODUCT_PROPERTY,
        self::PERMISSION_ORDERS,
        self::PERMISSION_PAYMENTS,
        self::PERMISSION_DISCOUNT,
        self::PERMISSION_DELIVERY_METHODS,
        self::PERMISSION_POST_COMMENTS,
        self::PERMISSION_MENUS,
        self::PERMISSION_FAQS,
        self::PERMISSION_BANNERS,
        self::PERMISSION_USERS,
        self::PERMISSION_TICKETS,
        self::PERMISSION_NOTIFY,
        self::PERMISSION_SETTING,
        self::PERMISSION_IT_CITY_PANEL,
        self::PERMISSION_CUSTOMER_PANEL,
        self::PERMISSION_ADMIN_TO_PANEL,
        self::PERMISSION_POST_AUTHORS,
    ];

    //relations
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // methods

    public function rolesCount() : int
    {
        return $this->roles->count() ?? 0;
    }

    public function usersCount() : int
    {
        return $this->users->count() ?? 0;
    }

    public function textName()
    {
        foreach (self::$permissions as $permission)
        {
            if ($this->name == $permission['name'])
            {
                return $permission['description'];
            }
        }
        return 'سطح دسترسی یافت نشد.';
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
