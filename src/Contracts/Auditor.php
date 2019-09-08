<?php

namespace Roldandvg\Auditing\Contracts;

interface Auditor
{
    /**
     * Get an audit driver instance.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable $model
     *
     * @return AuditDriver
     */
    public function auditDriver(Auditable $model): AuditDriver;

    /**
     * Perform an audit.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable $model
     *
     * @return void
     */
    public function execute(Auditable $model);
}
