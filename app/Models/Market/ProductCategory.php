<?php

namespace App\Models\Market;

use App\Models\Content\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'description', 'slug', 'image', 'status', 'tags', 'show_in_menu', 'parent_id', 'route_code'];


    //relations
    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function attributes()
    {
        return $this->hasMany(CategoryAttribute::class, 'category_id');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id');
    }

    public static array $levels = [
        1 => 'دسته اصلی',
        2 => 'زیر دسته اصلی',
        3 => 'فرزند زیر دسته اصلی',
    ];

    //methods
    public function path()
    {
        return route('customer.market.category.products', $this->slug);
    }
}
