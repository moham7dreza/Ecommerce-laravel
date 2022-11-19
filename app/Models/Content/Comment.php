<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const STATUS_NEW = 2;

    public const APPROVED = 1;
    public const NOT_APPROVED = 0;

    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_NEW];

    protected $fillable = ['body', 'parent_id', 'author_id', 'commentable_id', 'commentable_type', 'approved', 'status'];


    //relations
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }

    //methods
    public function cssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'success';
        else if ($this->status === self::STATUS_INACTIVE) return 'danger';
        else return 'warning';
    }

    public function btnCssStatus(): string
    {
        if ($this->status === self::STATUS_ACTIVE) return 'danger';
        else if ($this->status === self::STATUS_INACTIVE) return 'success';
        else return 'warning';
    }

    public function textStatus(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
    }

    public function cssApprove(): string
    {
        if ($this->approved === self::APPROVED) return 'success';
        else if ($this->approved === self::NOT_APPROVED) return 'danger';
        else return 'warning';
    }
    public function btnCssApprove(): string
    {
        if ($this->approved === self::APPROVED) return 'danger';
        else if ($this->approved === self::NOT_APPROVED) return 'success';
        else return 'warning';
    }

    public function textApprove(): string
    {
        return $this->approved === self::APPROVED ? 'تایید شده' : 'تایید نشده';
    }

    public function limitedBody(): string
    {
        return Str::limit($this->body, 50);
    }

    public function textAuthorName(): string
    {
        return $this->user->fullName ?? 'نویسنده ندارد.';
    }

    public function authorImage(): string
    {
        return $this->user->image() ?? 'عکس ندارد.';
    }

    public function textParentName(): string
    {
        return is_null($this->parent_id) ? 'نظر اصلی' : $this->parent->name;
    }

    public function answersCount(): int
    {
        return $this->answers->count() ?? 0;
    }

    public function getCommentableName(): string
    {
        return Str::limit($this->commentable->title, 50) ?? Str::limit($this->commentable->name, 50) ?? 'عنوانی ندارد';
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
