<?php

namespace App\Models\SmartAssemble;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemMenu extends Model
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
}
