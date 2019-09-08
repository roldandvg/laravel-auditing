<?php

namespace Roldandvg\Auditing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Roldandvg\Auditing\Contracts\AuditDriver auditDriver(\Roldandvg\Auditing\Contracts\Auditable $model);
 * @method static void execute(\Roldandvg\Auditing\Contracts\Auditable $model);
 */
class Auditor extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return \Roldandvg\Auditing\Contracts\Auditor::class;
    }
}
