@extends(config('activity-log.layout_name'))

@section(config('activity-log.section_name'))
<section class="{{ $cssClass['container'] }}">
    <div class="{{ $cssClass['card'] }}">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="m-0">{{ trans('activity-log::sp_activity_log.activity_log_show') }}</h4>
                <a class="btn {{ $cssClass['btn'] }}" href="{{ route($routeName . '.index') }}">{{ trans('activity-log::sp_activity_log.back_to_list') }}</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                @include('activity-log::show-table')
            </div>
        </div>
    </div>
</section>
@endsection
