<?php

namespace Share\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasStatus
{
    use HasRelationships;

//    public const STATUS_ACTIVE = 1;
//    public const STATUS_INACTIVE = 0;
//    public static array $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

//    public function textStatus(): string
//    {
//        return $this->status === self::STATUS_ACTIVE ? 'فعال' : 'غیر فعال';
//    }

}
