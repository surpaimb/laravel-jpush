<?php

declare(strict_types=1);

namespace Surpaimb\JPush\Contracts;

use Surpaimb\JPush\PushPayload;

interface PushPayloadMakeable
{
    /**
     * Make push payload.
     * @param \Surpaimb\JPush\PushPayload $payload
     */
    public function make(PushPayload $payload);
}
