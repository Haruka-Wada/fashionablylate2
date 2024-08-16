@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
<div class="header-button">
    <button onclick="location.href='/register'">register</button>
</div>
@endsection

@section('section-title')
<div class="section-title">
    <p>Login</p>
</div>
@endsection

@section('section-contents')
<div class="section-container">
    <div class="login-form">
        <div class="login-item">
            <form action="/login" method="post">
                @csrf
                <dl>
                    <dt><label for="email">メールアドレス</label></dt>
                    <dd>
                        <input type="text" id="email" name="email" placeholder="例: test@example.com" value=>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="password">パスワード</label></dt>
                    <dd>
                        <input type="text" id="password" name="password" placeholder="例: coachtech1106">
                    </dd>
                </dl>
                <div class="login-button">
                    <button>ログイン</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection