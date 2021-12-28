@extends('layouts.app')

@section('title', '')

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
            <h1 class="login-user">{{ $user->name }}さんお疲れ様です！</h1>
            <div class="work-wrapper">
                <div class="attendance">
                    <section class="attendance-start">
                        <h1 class="work-title">
                            <a href="" class="work-btn">勤務開始</a>
                        </h1>
                    </section>
                    <section class="attendance-end">
                        <h1 class="work-title">
                            <a href="" class="work-btn">勤務終了</a>
                        </h1>
                    </section>
                </div>
                <div class="rest">
                    <section class="rest-start">
                        <h1 class="work-title">
                            <a href="" class="work-btn">休憩開始</a>
                        </h1>
                    </section>
                    <section class="rest-end">
                        <h1 class="work-title">
                            <a href="" class="work-btn">休憩終了</a>
                        </h1>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
