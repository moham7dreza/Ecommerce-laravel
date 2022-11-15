<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $casts = ['logo' => 'array', 'icon' => 'array'];


//    protected $fillable = ['title', 'description', 'keywords', 'logo', 'icon'];
    protected $guarded = ['id'];

    //Methods
    public function logo(): string
    {
        return asset($this->logo);
    }

    public function icon(): string
    {
        return asset($this->icon);
    }
}
