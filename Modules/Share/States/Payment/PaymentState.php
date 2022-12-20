<?php

namespace Modules\Share\States\Payment;

use Modules\Share\States\Payment\States\Failed;
use Modules\Share\States\Payment\States\Paid;
use Modules\Share\States\Payment\States\Pending;
use Spatie\ModelStates\Attributes\DefaultState;
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;
use Spatie\ModelStates\Attributes\AllowTransition;


#[
    AllowTransition(Pending::class, Paid::class),
    AllowTransition(Pending::class, Failed::class),
    DefaultState(Pending::class),
]
abstract class PaymentState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Paid::class)
            ->allowTransition(Pending::class, Failed::class)
        ;
    }

}
