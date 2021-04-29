<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HelloResuest;

use Validator;

class HelloController extends Controller
{
    public function index(Request $request) 
    {
        $validator = Validator::make($request->query(), [
            'id'   => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            $msg = 'クエリにー問題があります';
        }
        else {
            $msg = 'ID/PASSを受け付けました。フォームを入力下さい。';
        }

        return view('hello.index', [
            'msg' => $msg,
            ]);
    }

    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age'  => 'numeric|between:0,150',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email'    => 'メールアドレスが必要です。',
            'age.numeric'   => '年齢は整数で記入下さい。',
            'age.between'   => '年齢は0〜150の間で入力下さい。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/hello')
            ->withErrors($validator)
            ->withInput();
        }
        return view('hello.index',['msg' => '正しく入力されました！']);
    }
}