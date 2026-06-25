@extends('admin.layout')

@section('contents')
<h1>管理画面 ログイン</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/admin/login" method="post">
    @csrf
    ログインID：<input type="text" name="login_id"><br>
    パスワード：<input type="password" name="password"><br>
    <input type="submit" value="ログインする">
</form>
@endsection