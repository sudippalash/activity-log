<?php

namespace Sudip\ActivityLog\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Sudip\ActivityLog\Traits\ActivityLogUtility;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    use ActivityLogUtility;
    
    protected $routeName;

    public function __construct()
    {
        $this->routeName = config('activity-log.route_name');
    }

    public function index(Request $request)
    {
        $cssClass = $this->cssGenerate();
        $routeName = $this->routeName;

        $sql = Activity::with('causer');

        if ($request->q) {
            $sql->where('description', 'LIKE', '%'.$request->q.'%');
        }

        if ($request->ip) {
            $sql->where('ip', $request->ip);
        }

        if ($request->name) {
            $sql->where('log_name', $request->name);
        }

        if ($request->event) {
            $sql->where('event', $request->event);
        }

        $records = $sql->paginate($request->limit ?? 15);

        $logNames = Activity::groupBy('log_name')->pluck('log_name')->toArray();
        $events = Activity::groupBy('event')->pluck('event')->toArray();

        return view($this->getBladeName() . '.index', compact('routeName', 'cssClass', 'records', 'logNames', 'events'));
    }

    public function show(Request $request, $id)
    {
        $cssClass = $this->cssGenerate();
        $routeName = $this->routeName;

        $data = Activity::with('causer')->findOrFail($id);

        $causerType = explode('\\', $data->causer_type);
        $causerType = end($causerType);

        $properties = json_decode($data->properties, true);

        return view($this->getBladeName() . '.show', compact('routeName', 'cssClass', 'data', 'causerType', 'properties'));
    }
}