@extends(config('activity-log.layout_name'))

@section(config('activity-log.section_name'))
<section class="{{ $cssClass['container'] }}">
    <div class="{{ $cssClass['card'] }}">
        <div class="panel-heading">
            <h4>{{ trans('activity-log::sp_activity_log.activity_logs') }}</h4>
        </div>

        <div class="panel-body">
            <div class="text-right" style="margin-bottom: 15px;">
                <form method="GET" action="{{ route($routeName . '.index') }}" class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="{{ trans('activity-log::sp_activity_log.search') }}">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="ip" value="{{ Request::get('ip') }}" placeholder="{{ trans('activity-log::sp_activity_log.ip') }}">
                    </div>
                    
                    <div class="form-group">
                        <select name="name" class="form-control">
                            <option value="">{{ trans('activity-log::sp_activity_log.all_field', ['field' => trans('activity-log::sp_activity_log.name')]) }}</option>
                            @foreach($logNames as $logName)
                                <option value="{{ $logName }}" {{ (Request::get('name') == $logName) ? 'selected' : '' }}>{{ ucwords($logName) }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select name="event" class="form-control">
                            <option value="">{{ trans('activity-log::sp_activity_log.all_field', ['field' => trans('activity-log::sp_activity_log.event')]) }}</option>
                            @foreach($events as $event)
                                <option value="{{ $event }}" {{ (Request::get('event') == $event) ? 'selected' : '' }}>{{ ucwords($event) }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="form-group">
                        <button type="submit" class="btn {{ $cssClass['btn'] }}">{{ trans('activity-log::sp_activity_log.search') }}</button>
                        <a class="btn {{ $cssClass['btn'] }}" href="{{ route($routeName . '.index') }}">X</a>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                @include('activity-log::list-table')
            </div>
        </div>
    </div>
</section>
@endsection
