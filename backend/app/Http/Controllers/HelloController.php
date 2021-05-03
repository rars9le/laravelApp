<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloResuest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from users');
        return view('hello.index', ['items' => $items,]);
    }

    public function post(HelloResuest $request)
    {
        $items = DB::select('select * from users');
        return view('hello.index', ['items' => $items,]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name'       => $request->name,
            'email'      => $request->mail,
            'age'        => $request->age,
            'password'   => $request->password,
        ];

        DB::insert('insert into users (name, age, email, password) values (:name, :age, :email, :password)', $param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from users where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id'       => $request->id,
            'name'       => $request->name,
            'email'      => $request->mail,
            'age'        => $request->age,
            'password'        => $request->password,
        ];
        DB::update('update users set name = :name, email = :email, age = :age, password = :password where id = :id', $param);
        return redirect('/hello');
    }


    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from users where id = :id', $param);
        return view('hello.delete', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = [
            'id'       => $request->id,
        ];
        DB::update('delete from users where id = :id', $param);
        return redirect('/hello');
    }
}
