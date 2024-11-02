<table class="table {{ $cssClass['table'] }}">
    <tr>
        <th style="width:160px;">{{ trans('activity-log::sp_activity_log.id') }}</th>
        <th style="width:10px;">:</th>
        <td colspan="3">{{ $data->subject_id }}</td>
    </tr>
    <tr>
        <th>{{ trans('activity-log::sp_activity_log.description') }}</th>
        <th>:</th>
        <td colspan="3">{{ $data->description }}</td>
    </tr>
    <tr>
        <th>{{ trans('activity-log::sp_activity_log.ip') }}</th>
        <th>:</th>
        <td colspan="3">{{ $data->ip }}</td>
    </tr>
    <tr>
        <th>{{ trans('activity-log::sp_activity_log.event') }}</th>
        <th>:</th>
        <td colspan="3">{{ ucwords($data->event) }}</td>
    </tr>
    <tr>
        <th>{{ trans('activity-log::sp_activity_log.created_by') }}</th>
        <th>:</th>
        <td colspan="3">{{ $data->causer->name ?? '-' }} ({{ $causerType }})</td>
    </tr>
    <tr>
        <th>{{ trans('activity-log::sp_activity_log.created_at') }}</th>
        <th>:</th>
        <td colspan="3">{{ $data->created_at }}</td>
    </tr>
    <tr>
        <th rowspan="{{ count($properties['attributes']) + 1 }}">{{ trans('activity-log::sp_activity_log.details') }}</th>
        <th rowspan="{{ count($properties['attributes']) + 1 }}">:</th>
        <td>{{ trans('activity-log::sp_activity_log.field') }}</td>
        <td>{{ trans('activity-log::sp_activity_log.new') }}</td>
        <td>{{ trans('activity-log::sp_activity_log.old') }}</td>
    </tr>
    @foreach ($properties['attributes'] as $key => $item)
    <tr>
        <td>{{ $key }}</td>
        <td>{{ $item }}</td>
        <td>{{ $properties['old'][$key] ?? '' }}</td>
    </tr>
    @endforeach
</table>