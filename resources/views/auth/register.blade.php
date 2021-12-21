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
                        <input type="name" name="name" placeholder="名前" required value="{{ old('name') }}">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="email register-input">
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
                    <div class="password_confirmation register-input">
                        <input type="password" name="password_confirmation" placeholder="確認用パスワード" required value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="button">会員登録</button>
                </form>
            </div>
            <p class="register-except">アカウントをお持ちの方はこちらから</p>
            <a href="/login" class="login-btn">ログイン</a>
        </div>
    </div>
@endsection
