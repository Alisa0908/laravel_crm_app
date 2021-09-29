@extends('layouts.main')

@section('title', '編集画面')

@section('content')
    <h1>編集画面</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('crms.update', $crm) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name', $crm->name) }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{ old('email', $crm->email) }}">
        </div>
        <div>
            <label for="zipcode">郵便番号</label>
            <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $crm->zipcode) }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" name="address" id="address" cols="30"
                rows="10">{{ old('address', $crm->address) }}</textarea>
        </div>
        <div>
            <label for="phone">電話番号</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $crm->phone) }}">
        </div>
        <input type="submit" value="更新">
    </form>
    <button type="button" onclick="location.href='{{ route('crms.show', $crm) }}'">戻る</button>
@endsection
