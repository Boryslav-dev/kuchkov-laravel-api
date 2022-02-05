<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sensors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'created_at',
        'updated_at',
    ];
}
