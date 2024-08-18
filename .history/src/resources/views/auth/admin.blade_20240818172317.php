@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<div class="header-button">
    
        @csrf
        <button>logout</button>
    </form>
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
                <th class="contacts-item-name">お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach( $contacts as $contact)
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