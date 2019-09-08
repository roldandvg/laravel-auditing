<?php

namespace Roldandvg\Auditing\Resolvers;

use Illuminate\Support\Facades\Request;

class IpAddressResolver implements \Roldandvg\Auditing\Contracts\IpAddressResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve(): string
    {
        return Request::ip();
    }
}
