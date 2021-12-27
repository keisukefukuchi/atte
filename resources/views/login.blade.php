@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            @if (session('sucess'))
                <div class="flash_message">
                    <?php
                    function func_alert($message)
                    {
                        echo "<script>alert('$message');</script>";
                    }
                    func_alert('会員登録が完了しました。');
                    ?>
                </div>
            @elseif (session('error'))
                <div class="flash_message">
                    <?php
                    function func_alert($message)
                    {
                        echo "<script>alert('$message');</script>";
                    }
                    func_alert('メールアドレスまたはパスワードが間違っています。');
                    ?>
                </div>
            @endif
            <h1 class="login-title">ログイン</h1>
            <div class="login-form">
                <form action="/login" method="post">
                    @csrf
                    <div class="email login-input">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                    </div>
                    <div class="password login-input">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}">
                    </div>
                    <button type="submit" class="button">ログイン</button>
                </form>
            </div>

            <p class="login-except">アカウントをお持ちでない方はこちらから</p>
            <a href="/register" class="register-btn">会員登録</a>
        </div>
    </div>
@endsection
