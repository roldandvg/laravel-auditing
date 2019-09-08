<?php

namespace Roldandvg\Auditing\Events;

use Roldandvg\Auditing\Contracts\Audit;
use Roldandvg\Auditing\Contracts\Auditable;
use Roldandvg\Auditing\Contracts\AuditDriver;

class Audited
{
    /**
     * The Auditable model.
     *
     * @var \Roldandvg\Auditing\Contracts\Auditable
     */
    public $model;

    /**
     * Audit driver.
     *
     * @var \Roldandvg\Auditing\Contracts\AuditDriver
     */
    public $driver;

    /**
     * The Audit model.
     *
     * @var \Roldandvg\Auditing\Contracts\Audit|null
     */
    public $audit;

    /**
     * Create a new Audited event instance.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable   $model
     * @param \Roldandvg\Auditing\Contracts\AuditDriver $driver
     * @param \Roldandvg\Auditing\Contracts\Audit       $audit
     */
    public function __construct(Auditable $model, AuditDriver $driver, Audit $audit = null)
    {
        $this->model = $model;
        $this->driver = $driver;
        $this->audit = $audit;
    }
}
