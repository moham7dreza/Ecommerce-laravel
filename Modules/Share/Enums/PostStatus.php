<?php

namespace Modules\Share\Enums;

// a Laravel specific base class
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DRAFT()
 * @method static self PREVIEW()
 * @method static self PUBLISHED()
 * @method static self ARCHIVED()
 */
final class PostStatus extends Enum {}
