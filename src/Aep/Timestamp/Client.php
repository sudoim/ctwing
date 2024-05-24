<?php

namespace Sudoim\CTWing\Aep\Timestamp;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{

    protected bool $withTimestamp = false;

    protected bool $needSignature = false;

    /**
     * @throws InvalidConfigException
     */
    public function getTimestamp(): string
    {
        return $this->requestRaw('echo')->getHeaderLine('x-ag-timestamp');
    }
}