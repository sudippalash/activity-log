@extends(config('activity-log.layout_name'))

@section(config('activity-log.section_name'))
<section class="{{ $cssClass['container'] }}">
    <div class="{{ $cssClass['card'] }}">
        <div class="panel-heading">
            <div style="height: 40px;">
                <h4 class="pull-left">{{ trans('activity-log::sp_activity_log.activity_log_show') }}</h4>
                <div class="pull-right">
                    <a class="btn {{ $cssClass['btn'] }} ml-3" href="{{ route($routeName . '.index') }}">{{ trans('activity-log::sp_activity_log.back_to_list') }}</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @include('activity-log::show-table')
            </div>
        </div>
    </div>
</section>
@endsection
