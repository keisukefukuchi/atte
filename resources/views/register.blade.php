@extends('layouts.app')

@section('title', '登録画面')

@section('content')
    <div class="register-container">
        <div class="register-wrapper">
            <h1 class="register-title">会員登録</h1>
            <div class="register-form">
                <form action="/register" method="post">
                    @csrf
                    <div class="name register-input">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="name" placeholder="名前" value="">
                    </div>
                    <div class="email register-input">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" placeholder="メールアドレス" value="">
                    </div>
                    <div class="password login-input">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="password" name="password" placeholder="パスワード">
                    </div>
                    <div class="password_confirmation register-input">
                        @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder="確認用パスワード">
                    </div>
                    <input type="submit" class="button" value="会員登録">
                </form>
            </div>
            <p class="register-except">アカウントをお持ちの方はこちらから</p>
            <a href="/login" class="login-btn">ログイン</a>
        </div>
    </div>
@endsection
