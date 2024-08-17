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
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach( $contacts as $contact)
            <tr>
                <td>{{ $contact('name') }} </td>
                <td>{{</td>
            </tr>
        </table>
    </div>
</div>

@endsection