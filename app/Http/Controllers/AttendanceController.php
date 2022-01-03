<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function getIndex()
    {
        $user = Auth::user();
        $id = Auth::id();

        $dt = new Carbon();
        $date = $dt->toDateString();

        $attendance = Attendance::where('user_id', $id)->where('date', $date)->first();

        $rest = Rest::where('attendance_id',$id)->get();
        $rest = $rest->whereNull("end_time")->first();
        if (empty($attendance)) {
            return view('index',['user' => $user]);
        }
        if($attendance->end_time) {
            $param = [
                "is_attendance_end" => true,
                "is_attendance_start" => true,
                'user' => $user
            ];
            return view('index',$param);
        }
        if ($attendance->start_time) {
            if (isset($rest)) {
                $param = [
                    "is_rest" => true,
                    "is_attendance_start" => true,
                    'user' => $user
                ];
                return view('index',$param);
            }else {
                $param = [
                    "is_rest" => false,
                    "is_rest_start" => false,
                    "is_rest_ent" => false,
                    "is_attendance_start" => true,
                    'user' => $user
                ];
                return view('index',$param);
            }
        }
    }
    public function startAttendance() {
        $user = Auth::id();
        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $param = [
            'user_id' => $user,
            'start_time' => $time,
            'date' => $date,
        ];
        Attendance::create($param);
        return redirect('/');
    }
    public function endAttendance() {
        $user = Auth::id();
        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        Attendance::where('user_id', $user)->where('date', $date)->update(['end_time' => $time]);
        return redirect('/');
    }
    public function getAttendance() {

    }
}
