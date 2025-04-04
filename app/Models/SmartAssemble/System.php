<?php

namespace App\Models\SmartAssemble;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;

class System extends Model implements Viewable
{
    use HasFactory, SoftDeletes, Likeable, InteractsWithViews, Favoriteable;

    protected $casts = ['image' => 'array'];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(SystemCategory::class, 'system_category_id');
    }

    public function system_type()
    {
        return $this->belongsTo(SystemType::class, 'system_type_id');
    }

    public function system_cpu()
    {
        return $this->belongsTo(SystemCpu::class, 'system_gen_id');
    }

    public function system_config()
    {
        return $this->belongsTo(SystemConfig::class, 'system_config_id');
    }

    public function systemItems()
    {
        return $this->hasMany(SystemItem::class);
    }

    public function system_name()
    {
        return $this->category->name . '-' . $this->system_type->name . '-' . $this->cpu->name . '-' . $this->config->name;
    }

    public function images()
    {
        return $this->hasMany(SystemGallery::class);
    }
}
