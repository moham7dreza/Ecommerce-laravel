<?php

namespace App\Models\SmartAssemble;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'system_user_type','description', 'image', 'system_price', 'status', 'system_marketable', 'tags',
        'system_config_id ', 'system_category_id', 'system_type_id', 'system_gen_id'
        , 'sold_number', 'frozen_number', 'marketable_number', 'system_view_number', 'system_rating', 'published_at'];

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
        return $this->category->name. '-' . $this->system_type->name. '-' . $this->cpu->name. '-' . $this->config->name;
    }
}
