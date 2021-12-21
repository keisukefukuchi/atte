@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            <h1 class="login-title">ログイン</h1>
            <div class="login-form">
                <form action="" method="post">
                    <div class="email login-input">
                        <input type="email" placeholder="メールアドレス" required>
                    </div>
                    <div class="password login-input">
                        <input type="password" placeholder="パスワード" required>
                    </div>
                    <button type="submit" class="button">ログイン</button>
                </form>
            </div>

            <p class="login-except">アカウントをお持ちでない方はこちらから</p>
            <a href="">会員登録</a>
        </div>
    </div>
@endsection
