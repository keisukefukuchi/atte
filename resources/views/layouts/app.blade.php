<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @guest
        <header class="guest">
            <h1 class="header-guest-title">Atte</h1>
        </header>
    @endguest
    @auth
        <header class="auth">
            <div class="header-right">
                <h1 class="header-auth-title">Atte</h1>
            </div>
            <div class="header-left">
                <nav class="nav">
                    <ul class="nav-lists">
                        <li class="nav-list"><a href="/">ホーム</a></li>
                        <li class="nav-list"><a href="/attendance/0">日付一覧</a></li>
                        <li class="nav-list"><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    @endauth
    <main>
        @yield('content')
    </main>
    <footer>
        <h6 class="footer-text">Atte,inc.</h6>
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
