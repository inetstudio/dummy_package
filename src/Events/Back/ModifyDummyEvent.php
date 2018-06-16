<?php

namespace InetStudio\Dummies\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Events\Back\ModifyDummyEventContract;

/**
 * Class ModifyDummyEvent.
 */
class ModifyDummyEvent implements ModifyDummyEventContract
{
    use SerializesModels;

    public $dummy;

    /**
     * ModifyDummyEvent constructor.
     *
     * @param DummyModelContract $dummy
     */
    public function __construct(DummyModelContract $dummy)
    {
        $this->dummy = $dummy;
    }
}
