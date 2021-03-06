@extends('layouts.main')

@section('title', '新規登録画面')

@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('crms.create') }}" method="get">
        @csrf
        <div>
            <label for="zipcode">郵便番号検索</label>
            <input type="text" name="zipcode" id="zipcode" placeholder="検索したい郵便番号">
            <input type="submit" value="検索">
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('crms.index') }}'">一覧に戻る</button>
@endsection
