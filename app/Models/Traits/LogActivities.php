<?php

/**
 * --------------
 * LogActivities
 * --------------
 *
 * Log user activiy for related model
 * by Fukigen Media
 * https://github.com/fukigenmedia
 */

namespace App\Models\Traits;

trait LogActivities
{
    protected static function bootLogActivities()
    {
        static::created(function ($model) {
            fukigen_log('create', 'created new row on model:' . get_class($model) . " (ID: $model->id)");
        });

        static::updated(function ($model) {
            fukigen_log('edit', 'updated row on model:' . get_class($model) . " (ID: $model->id)");
        });

        static::deleted(function ($model) {
            fukigen_log('delete', 'deleted row on model:' . get_class($model));
        });
    }
}
