@extends('layouts.app')

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
                    <div class="error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <div class="name-form">
                        <input type="text" id="name" class="name-form-item" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}">
                        <input type="text" class="name-form-item" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}">
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <p>性別<span>※</span></p>
                    <div class="error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <div class="gender-form">
                        <label><input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }} checked>男性</label>
                        <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>女性</label>
                        <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>その他</label>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="email">メールアドレス<span>※</span></label>
                    <div class="error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <input type="text" id="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for=" tell">電話番号<span>※</span></label>
                    <div class="error">
                        @if($errors->has('tell1'))
                        {{ $errors->first('tell1') }}
                        @elseif($errors->has('tell2'))
                        {{ $errors->first('tell2')}}
                        @elseif($errors->has('tell3'))
                        {{ $errors->first('tell3')}}
                        @endif
                    </div>
                </dt>
                <dd>
                    <div class="tell-form">
                        <input type="text" id="tell" name="tell1" placeholder="080" value="{{ old('tell1') }}">-
                        <input type="text" name="tell2" placeholder="1234" value="{{ old('tell2') }}">-
                        <input type="text" name="tell3" placeholder="5678" value="{{ old('tell3') }}">
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="address">住所<span>※</span></label>
                    <div class="error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <input type="text" id="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="building">建物名</label>
                </dt>
                <dd>
                    <input type="text" id="building" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="category">お問い合わせの種類<span>※</span></label>
                    <div class="error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <div class="select_wrapper">
                        <select name="category_id" id="category">
                            <option disabled selected>選択してください</option>
                            @foreach($categories as $category)
                            @if(old('category_id')==$category['id'])
                            <option value="{{ $category['id'] }}" selected>{{ $category['content'] }}</option>
                            @else
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="detail">お問い合わせ内容<span>※</span></label>
                    <div class="error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </dt>
                <dd>
                    <textarea type="text" id="detail" class="detail-form" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </dd>
            </dl>
        </div>
        <div class="section-contents-button">
            <button>確認画面</button>
        </div>
    </form>
</div>
@endsection