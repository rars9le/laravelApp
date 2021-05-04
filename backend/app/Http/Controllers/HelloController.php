<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloResuest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('people')->get();
        return view('hello.index', ['items' => $items,]);
    }

    public function post(HelloResuest $request)
    {
        $items = DB::select('select * from users');
        return view('hello.index', ['items' => $items,]);
    }

    public function show(Request $request)
    {
        $name = $request->name;
        $items = DB::table('people')
            ->where('name', 'like', '%' . $name . '%')
            ->orWhere('email', 'like', '%' . $name . '%')
            ->get();

        return view('hello.show', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name'     => $request->name,
            'email'    => $request->mail,
            'age'      => $request->age,
        ];

        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id'       => $request->id,
            'name'     => $request->name,
            'email'    => $request->mail,
            'age'      => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::table('people')
        ->where('id', $request->id)
        ->first();
        return view('hello.delete', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id,];
        DB::table('people')
            ->where('id', $request->id)
            ->delete();
        return redirect('/hello');
    }
}
