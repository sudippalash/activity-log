<?php

namespace Sudip\ActivityLog\Traits;

trait ActivityLogUtility
{
    private function getBladeName()
    {
        if (config('activity-log.bootstrap_v') == 3) {
            $blade = 'activity-log::bootstrap3';
        } elseif (config('activity-log.bootstrap_v') == 4) {
            $blade = 'activity-log::bootstrap4';
        } else {
            $blade = 'activity-log::bootstrap5';
        }

        return $blade;
    }

    private function cssGenerate()
    {
        $cssClass = config('activity-log.css');

        $btn = config('activity-log.bootstrap_v') == 3 ? 'btn-default' : 'btn-secondary';

        $cssClass['container'] = isset($cssClass['container']) ? $cssClass['container'] : 'container-fluid';

        $cssClass['card'] = isset($cssClass['card']) ? $cssClass['card'] : (config('activity-log.bootstrap_v') == 3 ? 'panel panel-default' : 'card');

        $cssClass['input'] = isset($cssClass['input']) ? $cssClass['input'] : 'form-control';

        $cssClass['btn'] = isset($cssClass['btn']) ? $cssClass['btn'] : $btn;

        $cssClass['table'] = isset($cssClass['table']) ? $cssClass['table'] : null;

        $cssClass['table_action_col_width'] = isset($cssClass['table_action_col_width']) ? $cssClass['table_action_col_width'] : null;

        $cssClass['table_action_btn'] = isset($cssClass['table_action_btn']) ? $cssClass['table_action_btn'] : $btn;

        return $cssClass;
    }
}
