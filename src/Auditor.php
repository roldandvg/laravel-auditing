<?php

namespace Roldandvg\Auditing;

use Illuminate\Support\Manager;
use InvalidArgumentException;
use Roldandvg\Auditing\Contracts\Auditable;
use Roldandvg\Auditing\Contracts\AuditDriver;
use Roldandvg\Auditing\Drivers\Database;
use Roldandvg\Auditing\Events\Audited;
use Roldandvg\Auditing\Events\Auditing;
use Roldandvg\Auditing\Exceptions\AuditingException;

class Auditor extends Manager implements Contracts\Auditor
{
    /**
     * {@inheritdoc}
     */
    public function getDefaultDriver()
    {
        return 'database';
    }

    /**
     * {@inheritdoc}
     */
    protected function createDriver($driver)
    {
        try {
            return parent::createDriver($driver);
        } catch (InvalidArgumentException $exception) {
            if (class_exists($driver)) {
                return $this->app->make($driver);
            }

            throw $exception;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function auditDriver(Auditable $model): AuditDriver
    {
        $driver = $this->driver($model->getAuditDriver());

        if (!$driver instanceof AuditDriver) {
            throw new AuditingException('The driver must implement the AuditDriver contract');
        }

        return $driver;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Auditable $model)
    {
        if (!$model->readyForAuditing()) {
            return;
        }

        $driver = $this->auditDriver($model);

        if (!$this->fireAuditingEvent($model, $driver)) {
            return;
        }

        if ($audit = $driver->audit($model)) {
            $driver->prune($model);
        }

        $this->app->make('events')->dispatch(
            new Audited($model, $driver, $audit)
        );
    }

    /**
     * Create an instance of the Database audit driver.
     *
     * @return \Roldandvg\Auditing\Drivers\Database
     */
    protected function createDatabaseDriver(): Database
    {
        return $this->app->make(Database::class);
    }

    /**
     * Fire the Auditing event.
     *
     * @param \Roldandvg\Auditing\Contracts\Auditable   $model
     * @param \Roldandvg\Auditing\Contracts\AuditDriver $driver
     *
     * @return bool
     */
    protected function fireAuditingEvent(Auditable $model, AuditDriver $driver): bool
    {
        return $this->app->make('events')->until(
            new Auditing($model, $driver)
        ) !== false;
    }
}
