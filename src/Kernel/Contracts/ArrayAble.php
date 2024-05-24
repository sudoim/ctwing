<?php

namespace Sudoim\CTWing\Kernel\Contracts;

use ArrayAccess;

interface ArrayAble extends ArrayAccess
{
    public function toArray();
}