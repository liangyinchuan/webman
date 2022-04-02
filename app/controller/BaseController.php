<?php

namespace app\controller;

use support\Request;

class BaseController
{
    public function index(Request $request)
    {
        return route_path();
        return response('hello webman');
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

}
