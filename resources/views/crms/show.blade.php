@extends('layouts.main')

@section('title', '顧客詳細画面')
    
@section('content')
    <h1>顧客詳細画面</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>    
        <tr>
            <td>{{ $crm->id }}</td>
            <td>{{ $crm->name }}</td>
            <td>{{ $crm->email }}</td>
            <td>{{ $crm->crm }}</td>
            <td>{{ $crm->address }}</td>
            <td>{{ $crm->phone }}</td>
        </tr>
    </table>
    <button type="button" onclick="location.href='{{ route('crms.edit', $crm) }}'">編集画面</button>
    <form action="{{ route('crms.destroy', $crm) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
    </form>
    <button type="button" onclick="location.href='{{ route('crms.index') }}'">一覧に戻る</button>
@endsection