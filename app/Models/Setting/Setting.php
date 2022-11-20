<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Share\Traits\HasFaDate;

class Setting extends Model
{
    use HasFactory, HasFaDate;

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

    public function limitedDescription(): string
    {
        return Str::limit($this->description, 50);
    }

    public function limitedKeywords(): string
    {
        return Str::limit($this->keywords, 50);
    }
}
