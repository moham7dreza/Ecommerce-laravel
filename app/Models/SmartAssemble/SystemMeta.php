<?php

namespace App\Models\SmartAssemble;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemMeta extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
}
