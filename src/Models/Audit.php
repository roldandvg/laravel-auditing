<?php

namespace Roldandvg\Auditing\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model implements \Roldandvg\Auditing\Contracts\Audit
{
    use \Roldandvg\Auditing\Audit;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values'   => 'json',
        'new_values'   => 'json',
        'auditable_id' => 'integer',
    ];
}
