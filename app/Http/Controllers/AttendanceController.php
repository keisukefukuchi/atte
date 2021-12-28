<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function getIndex()
    {
        $user = Auth::user();
        return view('index',['user' => $user]);
    }
}
