@extends('layout')

@section('contents')
<h1>ログイン後TopPage</h1>
<form action="/logout" method="post">
    @csrf
    <input type="submit" value="ログアウト">
</form>
@endsection