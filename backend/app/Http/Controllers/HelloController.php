<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloResuest;

use App\Models\Person;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $param = [
            'items' => $items,
            'sort'  => $sort,
            'user'  => $user,
        ];
        return view('hello.index', $param);
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

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
    public function getAuth(Request $request)
    {
        $param = ['message' => '??????????????????????????????'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,'password' => $password])) {
            $msg = '??????????????????????????????' . Auth::user()->name . '???';
        } else {
            $msg = '????????????????????????????????????';
        }
        return view('hello.auth', ['message' => $msg]);
    }
}
