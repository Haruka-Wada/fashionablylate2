@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')


@section('section-title')
<div class="section-title">
    <p>Admin</p>
</div>
@endsection

@section('section-contents')
<div class="contacts-container">
    <div class="contacts-table">
        <table>

        </table>
    </div>
</div>

@endsection