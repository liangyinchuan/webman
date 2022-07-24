<?php

namespace app\controller;

use Monolog\Logger;
use support\Log;
use support\Request;
use support\Redis;
use support\Cache;
use app\model\Test;
use support\Db;
use Tinywan\Jwt\JwtToken;

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
        $id = $test->getAttribute('id');
        Log
            ::INFO('insertid:'.$id);
        return $id;
    }

    public function logs(){
        $randNum = rand(100,999999);
        Log::info(__CLASS__,[__FUNCTION__,$randNum]);
        return md5(rand(0,$randNum));
    }

    public function clearTestTable(){
        return Db::table('test')->truncate();
    }

    public function jwt(){
        $user = [
            'id'  => 2022,
            'name'  => 'Tinywan',
        ];
        $token = JwtToken::generateToken($user);
        Log::info(__FUNCTION__,$token);
        return json_encode($token);
    }

    public function getJwtData(Request $request){
        $ret = array(
            JwtToken::getCurrentId(),
            JwtToken::getExtend(),
            JwtToken::getExtendVal('email'),
            JwtToken::getTokenExp(),
        );
        return json($ret);
    }

}
