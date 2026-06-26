@extends('layout')

@section('contents')
<h1>会員登録</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/user/register" method="post">
    @csrf
    名前：<input type="text" name="name" value="{{ old('name') }}"><br>
    email：<input type="text" name="email" value="{{ old('email') }}"><br>
    パスワード：<input type="password" name="password"><br>
    パスワード（確認）：<input type="password" name="password_confirmation"><br>
    <input type="submit" value="登録する"><br>
</form>
@endsection