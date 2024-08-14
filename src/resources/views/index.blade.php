@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('section-title')
<div class="section-title">
    <p>Contact</p>
</div>
@endsection

@section('section-contents')
<div class="section-contents">
    <form action="/confirm" method="post">
        @csrf
        <div class="section-contents-item">
            <dl>
                <dt>
                    <label for="name">お名前<span>※</span></label>
                </dt>
                <dd>
                    <div class="name-form">
                        <input type="text" id="name" class="name-form-item" name="first_name" placeholder="例:山田" value="">
                        <input type="text" class="name-form-item" name="last_name" placeholder="例:太郎" value="">
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <p>性別<span>※</span></p>
                </dt>
                <dd>
                    <div class="gender-form">
                        <label><input type="radio" name="gender" value="1" checked>男性</label>
                        <label><input type="radio" name="gender" value="2">女性</label>
                        <label><input type="radio" name="gender" value="3">その他</label>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="email">メールアドレス<span>※</span></label>
                </dt>
                <dd>
                    <input type="text" id="email" name="email" placeholder="例:test@example.com">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="tell">電話番号<span>※</span></label>
                </dt>
                <dd>
                    <div class="tell-form">
                        <input type="text" id="tell" name="tell1" placeholder="080">-
                        <input type="text" name="tell2" placeholder="1234">-
                        <input type="text" name="tell3" placeholder="5678">
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="address">住所<span>※</span></label>
                </dt>
                <dd>
                    <input type="text" id="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="building">建物名</label>
                </dt>
                <dd>
                    <input type="text" id="building" name="building" placeholder="例:千駄ヶ谷マンション101">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="category">お問い合わせの種類<span>※</span></label>
                </dt>
                <dd>
                    <div class="select_wrapper">
                        <select name="category_id" id="category">
                            <option disabled selected>選択してください</option>
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="detail">お問い合わせ内容<span>※</span></label>
                </dt>
                <dd>
                    <textarea type="text" id="detail" class="detail-form" name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </dd>
            </dl>
        </div>
        <div class="section-contents-button">
            <button>確認画面</button>
        </div>
    </form>
</div>
@endsection