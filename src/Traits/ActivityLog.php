<?php

namespace Sudip\ActivityLog\Traits;

use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait ActivityLog
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        $modelName = isset($this->modelName) ? $this->modelName : $this->modelNamespace();

        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName($modelName)
            ->setDescriptionForEvent(fn (string $eventName) => "{$modelName} {$eventName}");
    }

    public function tapActivity(Activity $activity)
    {
        $activity->ip = \request()->ip();
    }

    public function modelNamespace()
    {
        $ref = new \ReflectionClass(self::class);

        return $ref->getShortName();
    }
}
