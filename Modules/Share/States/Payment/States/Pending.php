<?php

namespace Modules\Share\States\Payment\States;

class Pending extends \Modules\Share\States\Payment\PaymentState
{

    public function color(): string
    {
        return 'yellow';
    }
}
