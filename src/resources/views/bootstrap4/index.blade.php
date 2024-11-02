@extends(config('activity-log.layout_name'))

@section(config('activity-log.section_name'))
<section class="{{ $cssClass['container'] }}">
    <div class="{{ $cssClass['card'] }}">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="m-0">{{ trans('activity-log::sp_activity_log.activity_logs') }}</h4>
            </div>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route($routeName . '.index') }}" class="d-lg-flex justify-content-end">
                <div class="mb-3 mr-1">
                    <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="{{ trans('activity-log::sp_activity_log.search') }}">
                </div>
                
                <div class="mb-3 mr-1">
                    <input type="text" class="form-control" name="ip" value="{{ Request::get('ip') }}" placeholder="{{ trans('activity-log::sp_activity_log.ip') }}">
                </div>
                
                <div class="mb-3 mr-1">
                    <select name="name" class="form-control">
                        <option value="">{{ trans('activity-log::sp_activity_log.all_field', ['field' => trans('activity-log::sp_activity_log.name')]) }}</option>
                        @foreach($logNames as $logName)
                            <option value="{{ $logName }}" {{ (Request::get('name') == $logName) ? 'selected' : '' }}>{{ ucwords($logName) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3 mr-1">
                    <select name="event" class="form-control">
                        <option value="">{{ trans('activity-log::sp_activity_log.all_field', ['field' => trans('activity-log::sp_activity_log.event')]) }}</option>
                        @foreach($events as $event)
                            <option value="{{ $event }}" {{ (Request::get('event') == $event) ? 'selected' : '' }}>{{ ucwords($event) }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-3">
                    <button type="submit" class="btn {{ $cssClass['btn'] }}">{{ trans('activity-log::sp_activity_log.search') }}</button>
                    <a class="btn {{ $cssClass['btn'] }}" href="{{ route($routeName . '.index') }}">X</a>
                </div>
            </form>

            <div class="table-responsive">
                @include('activity-log::list-table')
            </div>
        </div>
    </div>
</section>
@endsection
