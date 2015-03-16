<?php

namespace common\actsAsTenant\exceptions;


class TenantCanNotBeChangedException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Tenant can not be changed");
    }
}