<?php

namespace App\Models\SmartAssemble;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemConfig extends Model
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
}
