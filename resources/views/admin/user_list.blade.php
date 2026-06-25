@extends('admin.auth_layout')

@section('contents')
<h1>ユーザー覧</h1>

<table border="1">
    <tr>
        <th>ユーザID</th>
        <th>ユーザ名</th>
        <th>購入した「買うもの」の数</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->completed_shopping_lists_count }}</td>
    </tr>
    @endforeach
</table>
@endsection