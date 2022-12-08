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

    public function path(): string
    {
        $modelObject = $this->subject_type::findOrFail($this->subject_id);
        if ($this->log_name === 'products') {
            if (is_null($modelObject)) { return '#'; }
            return route('customer.market.product', $modelObject);
        }
        else if ($this->log_name === 'users') {
            if (is_null($modelObject)) { return '#'; }
            return $modelObject->user_type == 1 ? route('admin.user.admin-user.edit', $modelObject)
                : route('admin.user.customer.edit', $modelObject);
        }
        else{
            return '#';
        }
    }
}
