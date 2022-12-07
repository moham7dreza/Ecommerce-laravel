<?php

namespace App\Models\ItCity\Office;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Share\Enums\Status;
use Share\Traits\HasFaDate;

class ServiceCategory extends Model
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

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }


    // Methods
    public function path(): string
    {
        return route('it-city.store.category.components', $this->slug);
    }

    public function textParentName(): string
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

    public function servicesCount(): int
    {
        return $this->services->count() ?? 0;
    }
}
