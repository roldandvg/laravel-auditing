<?php

namespace Roldandvg\Auditing\Resolvers;

use Illuminate\Support\Facades\Request;

class UserAgentResolver implements \Roldandvg\Auditing\Contracts\UserAgentResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve()
    {
        return Request::header('User-Agent');
    }
}
