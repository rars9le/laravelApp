@extends('layouts.helloapp')

@section('title', 'edit')

@section('menubar')
    @parent
    更新ページ
@endsection

@section('content')
    <form action="/hello/edit" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $form->id }}">
            <tr>
                <th>name:</th>
                <td>
                    <input type="text" name="name" value="{{ $form->name }}">
                </td>
            </tr>
            <tr>
                <th>mail: </th>
                <td>
                    <input type="text" name="mail" value="{{ $form->email }}">
                </td>
            </tr>
            <tr>
                <th>age: </th>
                <td>
                    <input type="text" name="age" {{ $form->age }}>
                </td>
            </tr>
            <tr>
                <th>password: </th>
                <td>
                    <input type="text" name="password" {{ $form->password }}>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright 2021
@endsection