@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<div class="header-button">
    <button onclick="location.href='/register'">register</button>
</div>
@endsection

@section('section-title')
<div class="section-title">
    <p>Admin</p>
</div>
@endsection

@section('section-contents')
<div class="contacts-container">
    <div class="contacts-table">
        <table>
            <tr>
                <th>お名前</th>
                <rh></rh>
            </tr>
        </table>
    </div>
</div>

@endsection