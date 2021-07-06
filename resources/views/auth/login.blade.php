<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>在庫管理システム</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="preload">
    <div id="app" class="wrapper">
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div class="login">
                <div class="login__inner">
                    <div>
                        <img src="{{ asset('assets/img/TopLogo.png') }}">
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="float: left;position: relative; left: 50%;">
                            @foreach ($errors->all() as $error)
                            <li style="position: relative; left: -50%; list-style-type: none;">{!! nl2br(e($error)) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('message') }}</li>
                        </ul>
                    </div>
                    @endif
                    <div>
                        <input id="user_id" name="user_id" type="text" placeholder="ID" maxlength="10"
                            value="{{ old('user_id') ?? ''  }}">
                    </div>
                    <div>
                        <input id="password" name="password" type="password" placeholder="パスワード">
                    </div>
                    <div>
                        <button type="submit" class="button--oval--login">ログイン</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
