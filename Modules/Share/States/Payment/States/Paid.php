<?php

namespace Modules\Share\States\Payment\States;

class Paid extends \Modules\Share\States\Payment\PaymentState
{

    public function color(): string
    {
        return 'green';
    }
}
