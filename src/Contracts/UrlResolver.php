<?php

namespace Roldandvg\Auditing\Contracts;

interface UrlResolver
{
    /**
     * Resolve the URL.
     *
     * @return string
     */
    public static function resolve(): string;
}
