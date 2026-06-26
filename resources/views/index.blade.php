@extends('layout')

@section('contents')
<h1>ログイン</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/login" method="post">
    @csrf
    email：<input type="text" name="email" value="{{ old('email') }}"><br>
    パスワード：<input type="password" name="password"><br>
    <input type="submit" value="ログインする"><br>
    <a href="/user/register">会員登録</a>
</form>
@endsection