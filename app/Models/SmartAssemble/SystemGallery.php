<?php

namespace App\Models\SmartAssemble;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemGallery extends Model
{
    protected $table = 'system_galleries';

    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = ['image' => 'array'];


    public function system_type()
    {
        return $this->belongsTo(SystemType::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }
}
