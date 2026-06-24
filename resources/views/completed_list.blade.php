@extends('layout')

@section('contents')
<h1>購入済み「買うもの」一覧</h1>

<a href="/home">「買うもの」一覧に戻る</a><br>

<table border="1">
    <tr>
        <th>「買うもの」名</th>
        <th>購入日</th>
    </tr>
    @foreach ($completedLists as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->created_at->format('Y/m/d') }}</td>
    </tr>
    @endforeach
</table>

現在 {{ $completedLists->currentPage() }} ページ目<br>
<a href="{{ $completedLists->url(1) }}">最初のページ</a> /
<a href="{{ $completedLists->previousPageUrl() ?? '#' }}">前に戻る</a> /
<a href="{{ $completedLists->nextPageUrl() ?? '#' }}">次に進む</a>

<br><br>
<a href="/logout">ログアウト</a>
@endsection