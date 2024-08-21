@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-button')
<div class="header-button">
    <button onclick="location.href='/login'">login</button>
</div>
@endsection

@section('section-title')
<div class="section-title">
    <p>Register</p>
</div>
@endsection

@section('section-contents')
<div class="section-container">
    <div class="register-form">
        <div class="register-item">
            <form action="/register" method="post">
                @csrf
                <dl>
                    <dt><label for="name">お名前</label></dt>
                    @if(@error('name'))
                        
                    <dd>
                        <input type="text" id="name" name="name" placeholder="例: 山田太郎" value="{{ old('name') }}">
                    </dd>
                </dl>
                <dl>
                    <dt><label for="email">メールアドレス</label></dt>
                    <dd>
                        <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    </dd>
                </dl>
                <dl>
                    <dt><label for="password">パスワード</label></dt>
                    <dd>
                        <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                    </dd>
                </dl>
                <div class="register-button">
                    <button>登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection