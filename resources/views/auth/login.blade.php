@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            <h1 class="login-title">ログイン</h1>
            <div class="login-form">
                <form action="/login" method="post">
                    @csrf
                    <div class="email login-input">
                        <input type="email" name="email" placeholder="メールアドレス" required value="{{ old('email') }}">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="password login-input">
                        <input type="password" name="password" placeholder="パスワード" required value="{{ old('password') }}">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="button">ログイン</button>
                </form>
            </div>

            <p class="login-except">アカウントをお持ちでない方はこちらから</p>
            <a href="/register" class="register-btn">会員登録</a>
        </div>
    </div>
@endsection
