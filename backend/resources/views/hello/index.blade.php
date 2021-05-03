@extends('layouts.helloapp')

@section('title', 'index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2021
@endsection
