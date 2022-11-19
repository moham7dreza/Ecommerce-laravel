<?php

namespace App\Models\Content;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'body', 'slug', 'status', 'tags'];

    //methods
    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function getFaCreatedDate(): string
    {
        return jalaliDate($this->created_at);
    }

    public function getFaUpdatedDate(): string
    {
        return jalaliDate($this->updated_at);
    }
}
