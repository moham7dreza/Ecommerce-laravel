<?php

namespace Modules\Share\States\Payment\States;

use Modules\Share\States\Payment\PaymentState;

class Failed extends PaymentState
{

    public function color(): string
    {
        return 'red';
    }
}
