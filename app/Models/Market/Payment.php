<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Share\States\Payment\PaymentState;
use Spatie\ModelStates\HasStates;

class Payment extends Model
{
    use HasFactory, SoftDeletes, HasStates;

    protected $guarded = ['id'];

    protected $casts = [
        'state' => PaymentState::class,
    ];


    // relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentable(): MorphTo
    {
        return $this->morphTo();
    }
}
