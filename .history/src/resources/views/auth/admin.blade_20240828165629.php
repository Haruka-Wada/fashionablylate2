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
        @csrf
        <div class="search-contents">
            <input type="text" class="keyword-input" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
            <select class="gender-select" name="gender">
                <option selected disabled>性別</option>
                <option value="">全て</option>
                <option value="1" {{ request('gender') == 1 ? 'checked' : '' }} checked>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'checked' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'checked' : '' }}>その他</option>
            </select>
            <select class="category_select" name="category_id">
                <option selected disabled>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}" @if(request('category_id')==$category['id']) selected @endif>{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input type="date" class="date-input" name="date">
            <div class="search-button">
                <button>検索</button>
            </div>
            <div class="reset-button">
                <button name="reset" value="reset">リセット</button>
            </div>
        </div>
    </form>
    <div class="option-contents">
        <div class="export-button">
            <form action="">
                <input class="export-button" type="submit" value="エクスポート">
            </form>
        </div>
        {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>
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
                    <a class="detail-button" href="#{{$contact->id}}">詳細</a>
                </td>
            </tr>

            <div class="modal" id="{{$contact->id}}">
                <a href="#!" class="modal-overlay"></a>
                <div class="modal__inner">
                    <div class="modal__content">
                        <form class="modal__detail-form" action="/delete" method="post">
                            @csrf
                            <div class="modal-form__group">
                                <label class="modal-form__label" for="">お名前</label>
                                <p>{{$contact->first_name}}{{$contact->last_name}}</p>
                            </div>

                            div.modal
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </table>
    </div>
</div>

@endsection