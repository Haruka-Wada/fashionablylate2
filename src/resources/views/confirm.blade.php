@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('section-title')
<div class="section-title">
    <p>Contact</p>
</div>
@endsection

@section('section-contents')
<div class="section-contents">
    <form action="/thanks" method="post">
        @csrf
        <table class="table">
            <tr>
                <td class="table-key">
                    <p>お名前</p>
                </td>
                <td class="table-item">
                    <div class="name-form">
                        <p>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</p>
                        <input type="text" class="name-form-item" name="first_name" value="{{ $contact['first_name'] }}" hidden>
                        <input type="text" class="name-form-item" name="last_name" value="{{ $contact['last_name'] }}" hidden>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>性別</p>
                </td>
                <td class="table-item">
                    <div class="gender-form">
                        @if($content['gender'] = 1)
                        <input type="text" name="gender" value="1" hidden>
                        <p>男性</p>
                        @elseif($contact['gender'] = 2)
                        <input type="text" name="gender" value="2" hidden>
                        <p>女性</p>
                        @else
                        <input type="text" name="gender" value="3" hidden>
                        <p>その他</p>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>メールアドレス</p>
                </td>
                <td class="table-item">
                    <p> {{ $contact['email'] }}</p>
                    <input type="text" id="email" name="email" value="{{ $contact['email'] }}" hidden>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>電話番号</p>
                </td class="table-item">
                <td>
                    <div class="tell-form">
                        <p>{{ $contact['tell1'] }}{{ $contact['tell2'] }}{{ $contact['tell3'] }}</p>
                        <input type="text" id="tell" name="tell1" value="{{ $contact['tell1'] }}" hidden>
                        <input type="text" id="tell" name="tell2" value="{{ $contact['tell2'] }}" hidden>
                        <input type="text" id="tell" name="tell3" value="{{ $contact['tell3'] }}" hidden>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>住所</p>
                </td>
                <td class="table-item">
                    <p>{{ $contact['address'] }}</p>
                    <input type="text" name="address" value="{{ $contact['address'] }}" hidden>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>建物名</p>
                </td>
                <td class="table-item">
                    <p>{{ $contact['building'] }}</p>
                    <input type="text" name="building" value="{{ $contact['building'] }}" hidden>
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>お問い合わせの種類</p>
                </td>
                <td class="table-item">
                    @foreach($categories as $category)
                    @if($category['id'] == $contact['category_id'])
                    <input type="text" name="category_id" value="{{ $contact['category_id'] }}" hidden>
                    <p>{{ $category['content'] }}</p>
                    @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="table-key">
                    <p>お問い合わせ内容</p>
                </td>
                <td class="table-item">
                    <p>{{ $contact['detail'] }}</p>
                    <textarea type="text" class="detail-form" name="detail" hidden>{{ $contact['detail'] }}</textarea>
                </td>
            </tr>
        </table>
        <div class="section-contents-button">
            <button class="submit-button">送信</button>
            <button type="submit" class="edit-button" name="back" value="back">修正</button>
        </div>
    </form>
</div>


@endsection