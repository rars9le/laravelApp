@extends('layouts.helloapp')

@section('title', 'person.find')

@section('menubar')
    @parent
    検索ページ
@endsection

@section('content')
    <form action="/person/find" method="post">
        @csrf
        <input type="text" name="input" value="{{ $input }}">
        <input type="submit" value="find">
    </form>
    @if (isset($item))
        <table>
            <tr>
                <th>name</th>
                <th>mail</th>
                <th>Age</th>
            </tr>
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        </table>
    @endif
@endsection

@section('footer')
    copyright 2021
@endsection
