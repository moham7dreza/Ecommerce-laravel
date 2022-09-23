<?php

namespace App\Models\SmartAssemble;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemCategory extends Model
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

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function systemTypes()
    {
        return $this->hasMany(SystemType::class, 'system_category_id');
    }

    public function getTypeValueAttribute()
    {
        switch ($this->type) {
            case 0:
                $result = 'سیستم گیمینگ';
                break;
            case 1:
                $result = 'سیستم رندرینگ';
                break;
            case 2:
                $result = 'سیستم اقتصادی';
                break;
            default :
                $result = 'سیستم تریدینگ';
        }
        return $result;
    }

    public function metas()
    {
        return $this->hasMany(SystemMeta::class);
    }
}
