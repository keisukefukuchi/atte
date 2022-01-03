@extends('layouts.app')

@section('title', '勤怠管理アプリ')

@section('content')
    @if (session('sucess'))
        <div class="flash_message">
            <?php
            function func_alert($message)
            {
                echo "<script>alert('$message');</script>";
            }
            func_alert('ログインが完了しました。');
            ?>
        </div>
    @endif
    <div class="container">
        <div class="wrapper">
            <h1 class="login-user">{{ $user->name }}さんお疲れ様です！<span></span></h1>
            <div class="work-wrapper">
                <div class="attendance">
                    <section class="attendance-start">
                        @if (!isset($is_attendance_start))
                            <h1 class="work-title">
                                <a href="/attendance/start" class="work-btn">勤務開始</a>
                            </h1>
                        @else
                            <p class="work-btn inActive">勤務開始</p>
                        @endif
                    </section>
                    <section class="attendance-end">
                        @if (!isset($is_attendance_end))
                            <h1 class="work-title">
                                <a href="/attendance/end" class="work-btn">勤務終了</a>
                            </h1>
                        @else
                            <p class="work-btn inActive">勤務終了</p>
                        @endif
                    </section>
                </div>
                <div class="rest">
                    <section class="rest-start">
                        @if (isset($is_rest))
                            @if (!$is_rest)
                                <h1 class="work-title">
                                    <a href="/break/start" class="work-btn">休憩開始</a>
                                </h1>
                            @else
                                <p class="work-btn inActive">休憩開始</p>
                            @endif
                        @else
                            <p class="work-btn inActive">休憩終了</p>
                        @endif
                    </section>
                    <section class="rest-end">
                        @if (isset($is_rest))
                            @if ($is_rest)
                                <h1 class="work-title">
                                    <a href="/break/end" class="work-btn">休憩終了</a>
                                </h1>
                            @else
                                <p class="work-btn inActive">休憩終了</p>
                            @endif
                        @else
                            <p class="work-btn inActive">休憩終了</p>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
