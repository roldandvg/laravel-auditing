<?php

namespace Roldandvg\Auditing\Contracts;

interface AuditDriver
{
    /**
     * Perform an audit.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable $model
     *
     * @return \Roldandvg\Auditing\Contracts\Audit
     */
    public function audit(Auditable $model): Audit;

    /**
     * Remove older audits that go over the threshold.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable $model
     *
     * @return bool
     */
    public function prune(Auditable $model): bool;
}
