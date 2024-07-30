<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataFastboat;
use App\Models\DataRoute;
use App\Models\MasterPort;
use App\Models\SchedulesSchedule;
use App\Models\SchedulesTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulesTripController extends Controller
{
    // this function is for view all data from trip table
    public function index()
    {
        $trip = SchedulesTrip::all();
        $title = 'Delete Fastboat Trip!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('schedules.trip.index', compact('trip'));
    }

    public function add()
    {
        $route = DataRoute::all();
        $fastboat = DataFastboat::all();
        $schedule = SchedulesSchedule::all();
        $deptPort = MasterPort::all();
        $arrivalPort = MasterPort::all();
        return view('schedules.trip.add', compact('route', 'fastboat', 'schedule', 'deptPort', 'arrivalPort'));
    }

    public function store(Request $request)
    {
        // Handle the request data validation
        $request->validate([
            'fbt_name' => 'required',
            'fbt_route' => 'required',
            'fbt_fastboat' => 'required',
            'fbt_schedule' => 'required',
            'fbt_dept_port' => 'required',
            'fbt_dept_time' => 'required',
            'fbt_time_limit' => 'required',
            'fbt_arrival_port' => 'required',
            'fbt_arrival_time' => 'required',
        ]);

        // Handle insert data to database
        $tripData = new SchedulesTrip();
        $tripData->fbt_name = $request->fbt_name;
        $tripData->fbt_route = $request->fbt_route;
        $tripData->fbt_fastboat = $request->fbt_fastboat;
        $tripData->fbt_schedule = $request->fbt_schedule;
        $tripData->fbt_dept_port = $request->fbt_dept_port;
        $tripData->fbt_dept_time = $request->fbt_dept_time;
        $tripData->fbt_time_limit = $request->fbt_time_limit;
        $tripData->fbt_time_gap = $request->fbt_time_gap;
        $tripData->fbt_arrival_port = $request->fbt_arrival_port;
        $tripData->fbt_arrival_time = $request->fbt_arrival_time;
        $tripData->fbt_info_en = $request->fbt_info_en;
        $tripData->fbt_info_idn = $request->fbt_info_idn;
        $tripData->fbt_shuttle_type = $request->fbt_shuttle_type;
        $tripData->fbt_shuttle_option = $request->fbt_shuttle_option;
        $tripData->fbt_updated_by = Auth()->id();
        $tripData->save();
        toast('Your data as been submited!', 'success');
        return redirect()->route('trip.view');
    }

    // this function will get the $id of the selected data and then view the fast boat edit form
    public function edit($id)
    {
        $tripEdit = SchedulesTrip::find($id);
        $route = DataRoute::all();
        $fastboat = DataFastboat::all();
        $schedule = SchedulesSchedule::all();
        $deptPort = MasterPort::all();
        $arrivalPort = MasterPort::all();
        return view('schedules.trip.edit', compact('tripEdit', 'route', 'fastboat', 'schedule', 'deptPort', 'arrivalPort'));
    }


    // this function will get the $id of the selected data and request data from input in fast boat edit from
    public function update(Request$request, $id) 
    {
        $tripData = SchedulesTrip::find($id);
        $tripData->fbt_name = $request->fbt_name;
        $tripData->fbt_route = $request->fbt_route;
        $tripData->fbt_fastboat = $request->fbt_fastboat;
        $tripData->fbt_schedule = $request->fbt_schedule;
        $tripData->fbt_dept_port = $request->fbt_dept_port;
        $tripData->fbt_dept_time = $request->fbt_dept_time;
        $tripData->fbt_time_limit = $request->fbt_time_limit;
        $tripData->fbt_time_gap = $request->fbt_time_gap;
        $tripData->fbt_arrival_port = $request->fbt_arrival_port;
        $tripData->fbt_arrival_time = $request->fbt_arrival_time;
        $tripData->fbt_info_en = $request->fbt_info_en;
        $tripData->fbt_info_idn = $request->fbt_info_idn;
        $tripData->fbt_shuttle_type = $request->fbt_shuttle_type;
        $tripData->fbt_shuttle_option = $request->fbt_shuttle_option;
        $tripData->fbt_updated_by = Auth()->id();
        $tripData->update();
        toast('Your data as been edited!', 'success');
        return redirect()->route('trip.view');
    }

    // this function will get the $id of selected data and do delete operation
    public function delete($id)
    {
        $tripData = SchedulesTrip::find($id);
        $tripData->delete();
        toast('Your data as been deleted!', 'success');
        return redirect()->route('trip.view');
    }

    // this function will get $id of selected data and view it in modal
    public function show($id)
    {
        $tripData = SchedulesTrip::find($id);
        return response()->json($tripData);
    }


    // this function will get $id of selected data and change the status
    public function status($id)
    {
        $tripData = SchedulesTrip::find($id);

        if ($tripData) {
            if ($tripData->fbt_status) {
                $tripData->fbt_status = 0;
            } else {
                $tripData->fbt_status = 1;
            }
            $tripData->save();
        }
        return back();
    }
}