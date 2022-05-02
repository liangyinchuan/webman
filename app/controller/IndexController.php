<?php

namespace app\controller;

use support\Log;
use support\Request;
use support\Redis;
use support\Cache;
use app\model\Test;
use support\Db;

class IndexController
{
    public function index(Request $request)
    {
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

    public function redis(Request $request){
        foreach ($request->all() as $k => $v){
            Redis::set($k,$v);
        }

        $ret = array();
        foreach ($request->all() as $k=>$v){
            $ret[$k] = Redis::get($k);
        }
        return json($ret);
    }

    public function cache(Request $request){
        foreach ($request->all() as $k => $v){
            Cache::set($k,$v);
        }

        $ret = array();
        foreach ($request->all() as $k=>$v){
            $ret[$k] = Cache::get($k);
        }


        return json($ret);
    }

    public function newdata(){
        $randNum = rand(100,999999);
        $test = new Test();
        $test->rand_num = $randNum;
        $test->save();
        return $test->getAttribute('id');
    }

    public function logs(){
        $randNum = rand(100,999999);
        Log::info(__CLASS__,[__FUNCTION__,$randNum]);
        return md5(rand(0,$randNum));
    }

    public function clearTestTable(){
        return Db::table('test')->truncate();
    }

}
