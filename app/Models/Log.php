<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Share\Traits\HasFaDate;

class Log extends Model
{
    use HasFactory, HasFaDate;

    protected $table = 'activity_log';

    // methods
    public function description(): string
    {
        return Str::limit($this->description);
    }

    public function causerName(): string
    {
        return $this->causer_type::query()->findOrFail($this->causer_id)->fullName ?? 'ایجاد کننده ندارد.';
    }

    public function properties()
    {
        return json_decode($this->properties, true);
    }
}
