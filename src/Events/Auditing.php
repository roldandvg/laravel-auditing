<?php

namespace Roldandvg\Auditing\Events;

use Roldandvg\Auditing\Contracts\Auditable;
use Roldandvg\Auditing\Contracts\AuditDriver;

class Auditing
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
     * Create a new Auditing event instance.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable   $model
     * @param \Roldandvg\Auditing\Contracts\AuditDriver $driver
     */
    public function __construct(Auditable $model, AuditDriver $driver)
    {
        $this->model = $model;
        $this->driver = $driver;
    }
}
