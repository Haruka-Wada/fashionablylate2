@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')

<form action="/logout" method="post">
    @csrf
    <div class="header-button">
        <button>logout</button>
    </div>
</form>
@endsection

@section('section-title')
<div class="section-title">
    <p>Admin</p>
</div>
@endsection

@section('section-contents')
<div class="contacts-container">
    <form action="/admin/search" method="get">
        <div class="search-contents">
            <input type="text"  class="content-input" name="content" value="{{ old('name') }}" placeholder="名前やメールアドレスを入力してください">
            <select class="gender-select" name="gender">
                <option selected disabled>性別</option>
                <option value="1" {{ old('gender') == 1 ? 'checked' : '' }} checked>男性</option>
                <option value="2" {{ old('gender') == 2 ? 'checked' : '' }}>女性</option>
                <option value="3" {{ old('gender') == 3 ? 'checked' : '' }}>その他</option>
            </select>
            <select name="category">
                <option selected disabled>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input type="date" name="date">
            <div class="search-button">
                <button>検索</button>
            </div>
            <div class="reset-button">
                <button>リセット</button>
            </div>
        </div>
    </form>
    <div class="contacts-table">
        <table>
            <tr>
                <th class="contacts-item-name">お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td class="contacts-item-name">{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
                <td>
                    @if($contact['gender'] == 1)
                    <p>男性</p>
                    @elseif($contact['gender'] == 2)
                    <p>女性</p>
                    @elseif($contact['gender'] == 3)
                    <p>その他</p>
                    @endif
                </td>
                <td>
                    {{ $contact['email']}}
                </td>
                <td>
                    @foreach($categories as $category)
                    @if($contact['category_id'] == $category['id'])
                    {{ $category['content']}}
                    @endif
                    @endforeach
                </td>
                <td>
                    <button class="detail-button">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection