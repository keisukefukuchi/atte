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
    <h1>メイン画面</h1>
@endsection
