@extends('layouts.app')

@section('title', '勤怠管理アプリ')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="attendance-table">
            <table>
                <tr class="attendance-title">
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
                @foreach ($attendances as $attendance)
                <tr class="attendance-contents">
                    <td>{{ $attendance->user->name}}</td>
                    <td>{{ $attendance->start_time }}</td>
                    <td>{{ $attendance->end_time }}</td>
                    <td>{{ $attendance->rest_sum }}</td>
                    <td>{{ $attendance->work_time }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
