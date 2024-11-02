<table class="table {{ $cssClass['table'] }}">
    <thead>
        <tr>
            <th>{{ trans('activity-log::sp_activity_log.id') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.created_at') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.name') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.event') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.description') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.ip') }}</th>
            <th>{{ trans('activity-log::sp_activity_log.created_by') }}</th>
            <th class="{{ $cssClass['table_action_col_width'] }}"></th>
        </tr>
    </thead>

    <tbody>
    @if($records->count() > 0)
        @foreach($records as $val)
        @php
            $causerType = explode('\\', $val->causer_type)
        @endphp
        <tr>
            <td>{{ $val->id }}</td>
            <td>{{ $val->created_at }}</td>
            <td>{{ ucwords($val->log_name) }}</td>
            <td>{{ ucwords($val->event) }}</td>
            <td>{{ $val->description }}</td>
            <td>{{ $val->ip }}</td>
            <td>{{ $val->causer->name ?? '-' }} ({{ end($causerType) }})</td>
            <td>
                <a class="btn {{ $cssClass['table_action_btn'] }} btn-sm" href="{{ route($routeName . '.show', $val->id) }}">{{ trans('activity-log::sp_activity_log.show') }}</a>
            </td>
        </tr>
        @endforeach
    @else
    <tr>
        <td colspan="6" class="text-center">{{ trans('activity-log::sp_activity_log.row_not_found') }}</td>
    </tr>
    @endif
    </tbody>
</table>