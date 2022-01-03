<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
use App\Models\User;
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
    public function getAttendance(int $num) {
        $dt = new Carbon();
        if($num == 0) {
            $date = $dt;
        }elseif ($num > 0) {
            $date = $dt->addDays($num);
        } else {
            $date = $dt->subDays(-$num);
        }
        $page_date = $date->toDateString();
        $attendances = Attendance::where('date', $page_date)->paginate(5);
        foreach ($attendances as $index => $attendance) {
            $attendance_id = $attendance->id;
            $rests = Rest::where('attendance_id', $attendance_id)->get();
            $rest_sum = 0;
            foreach ($rests as $rest) {
                $rest_start_time = strtotime($rest->start_time);
                $rest_end_time = strtotime($rest->end_time);
                $diff_rest_seconds =  $rest_end_time - $rest_start_time;
                $rest_sum = $rest_sum + $diff_rest_seconds;
            }
            $work_start_time = strtotime($attendance->start_time);
            $work_end_time = strtotime($attendance->end_time);
            if($work_end_time == false) {
                $now = Carbon::now();
                $now = strtotime($now);
                $diff_work_seconds = $now - $work_start_time;
            }else {
                $diff_work_seconds = $work_end_time - $work_start_time;
            }
            $diff_work = $diff_work_seconds - $rest_sum;


            $res_hours = floor($rest_sum /3600);
            $res_minutes = floor(($rest_sum / 60) % 60);
            $res_seconds = $rest_sum % 60;

            $work_hours = floor($diff_work / 3600);
            $work_minutes = floor(($diff_work / 60) % 60);
            $work_seconds = $diff_work % 60;

            $rest_time = Carbon::createFromTime($res_hours, $res_minutes, $res_seconds);
            $work_time = Carbon::createFromTime($work_hours, $work_minutes, $work_seconds);

            $attendances[$index]->rest_sum = $rest_time->toTimeString();
            $attendances[$index]->work_time = $work_time->toTimeString();
        }

        return view('attendance' ,compact("attendances","num", "page_date"));
    }
}
