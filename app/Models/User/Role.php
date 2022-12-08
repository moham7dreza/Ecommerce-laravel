<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Share\Traits\HasFaDate;

class Role extends Model
{
    use HasFactory, SoftDeletes, HasFaDate;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    // access everywhere
    //******************************************************************************************************************
    public const ROLE_SUPER_ADMIN = ['name' => 'role-super-admin', 'description' => 'مدیر ارشد سیستم - دسترسی نامحدود'];

    public static array $roles = [ self::ROLE_SUPER_ADMIN ];

    protected $fillable = ['name', 'description', 'status'];

    // Relations
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    // methods

    public function usersCount(): int
    {
        return $this->users->count() ?? 0;
    }

    public function permissionsCount(): int
    {
        return $this->permissions->count() ?? 0;
    }

    public function hasPermissionTo($permission)
    {
        return $this->permissions->contains('name', $permission->name);
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function limitedDescription(): string
    {
        return Str::limit($this->description, 50);
    }

    public function textName()
    {
        foreach (self::$roles as $role) {
            if ($this->name == $role['name']) {
                return $role['description'];
            }
        }
        return 'نقش یافت نشد.';
    }
}
