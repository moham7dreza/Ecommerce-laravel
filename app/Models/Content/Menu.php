<?php

namespace App\Models\Content;

use App\Models\Market\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['image' => 'array'];

    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public static $levels = [
        1 => 'منوی اصلی',
        2 => 'زیر منوی اصلی',
        3 => 'فرزند زیر منوی اصلی',
    ];

    public static $locations = [
        1 => 'فروشگاه - صفحه اصلی',
        2 => 'آیتی سیتی',
        3 => 'دنیای دیجیتالی',
    ];
}
