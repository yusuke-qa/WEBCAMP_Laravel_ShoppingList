@extends('layout')

@section('contents')
<h1>「買うもの」の登録</h1>

@if (session('message'))
    {{ session('message') }}<br>
@endif

<form action="/shopping_list/register" method="post">
    @csrf
    「買うもの」名:<input type="text" name="name"><br>
    <input type="submit" value="「買うもの」を登録する">
</form>

<h2>「買うもの」一覧</h2>

<a href="/completed_shopping_list/list">購入済み「買うもの」一覧</a><br>

<table border="1">
    <tr>
        <th>登録日</th>
        <th>「買うもの」名</th>
    </tr>
    @foreach ($shoppingLists as $item)
    <tr>
        <td>{{ $item->created_at->format('Y/m/d') }}</td>
        <td>{{ $item->name }}</td>
        <td>
            <form action="/shopping_list/complete/{{ $item->id }}" method="post">
                @csrf
                <input type="submit" value="完了"
                    onclick="return confirm('この「買うもの」を「完了」にします。よろしいですか？')">
            </form>
        </td>
        <td>
            <form action="/shopping_list/delete/{{ $item->id }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除"
                    onclick="return confirm('この「買うもの」を「削除」します。よろしいですか？')">
            </form>
        </td>
    </tr>
    @endforeach
</table>

現在 {{ $shoppingLists->currentPage() }} ページ目<br>
<a href="{{ $shoppingLists->url(1) }}">最初のページ</a> /
<a href="{{ $shoppingLists->previousPageUrl() ?? '#' }}">前に戻る</a> /
<a href="{{ $shoppingLists->nextPageUrl() ?? '#' }}">次に進む</a>

<br><br>
<a href="/logout">ログアウト</a>
@endsection