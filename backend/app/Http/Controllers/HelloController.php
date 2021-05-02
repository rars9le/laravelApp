<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloResuest;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index', [
            'msg' => 'フォームを入力下さい。',
        ]);
    }

    public function post(HelloResuest $request)
    {
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
