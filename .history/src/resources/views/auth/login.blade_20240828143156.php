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
                    <dt>
                        <label for="email">メールアドレス</label>
                        <p class="error-message">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </p>
                    </dt>
                    <dd>
                        <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="password">パスワード</label>
                    </dt>
                    <dd>
                        <input type="password" id="password" name="password" placeholder="例: coachtech1106">
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