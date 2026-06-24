@extends('layout')

@section('contents')
<h1>ログイン</h1>
<form action="/login" method="post">
    @csrf
    email：<input type="text" name="email"><br>
    パスワード：<input type="password" name="password"><br>
    <input type="submit" value="ログインする"><br>
    <a href="/register">会員登録</a>
</form>
@endsection