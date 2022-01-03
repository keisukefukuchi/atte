<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestController extends Controller
{
    public function startRest() {
        $user = Auth::id();
        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $attendance = Attendance::where('user_id', $user)->where('date', $date)->first();
        Rest::create([
            'attendance_id' => $attendance->id,
            'start_time' => $time,
        ]);
        return redirect('/');
    }
    public function endRest() {
        $user = Auth::id();
        $dt = new Carbon();
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $attendance = Attendance::where('user_id', $user)->where('date', $date)->first();
        $attendance_id = $attendance->id;
        $rest = Rest::where('attendance_id', $attendance_id)->get();
        $start_time = $rest->whereNull("end_time")->first();
        $start_time->update(['end_time' => $time]);
        return redirect('/');
    }
}
