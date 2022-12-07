<?php

namespace App\Models\ItCity\Store;

use App\Models\Market\Brand;
use App\Models\Market\CategoryAttribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Share\Enums\Status;
use Share\Traits\HasFaDate;

class HardwareCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasFaDate;

    public static array $statuses = [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = [
        'image' => 'array',
        'status' => Status::class,
    ];

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

    public function hardware(): HasMany
    {
        return $this->hasMany(Hardware::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(CategoryAttribute::class, 'category_id');
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class, 'category_id');
    }

    // Methods
    public function path(): string
    {
        return route('it-city.store.category.components', $this->slug);
    }

    public function getParent(): string
    {
        return is_null($this->parent_id) ? 'دسته اصلی' : $this->parent->name;
    }

    public function textStatus(): string
    {
        return $this->status === Status::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function imagePath(): string
    {
        return asset($this->image['indexArray']['medium']);
    }

    public function cssStatus(): string
    {
        if ($this->status === Status::STATUS_ACTIVE) return 'success';
        else if ($this->status === Status::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function hardwareCount(): int
    {
        return $this->hardware->count() ?? 0;
    }
}
