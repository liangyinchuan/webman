<?php

namespace app\controller;

use support\Request;

class TestController
{

    public function tt(Request $request){
//        return response()->download(upload_path().DIRECTORY_SEPARATOR.'123.mp4');
//        return response()->file(upload_path().DIRECTORY_SEPARATOR.'123.mp4');
//        return redirect('/test/get'); // 重定向
//        return $request->action;
//        return $request->controller;
//        return $request->getLocalIp();
        return json($_SERVER);
        return json($request->header());
//        return $request->getRemoteIp();
//        return $request->getRemotePort();
        return $request->getRealIp();
        return upload_path();
    }

    public function get(Request $request){
//        return $request->method();
        return json($request->get('name'));
        return json($request->all());
    }

    public function post(Request $request){

        return json($request->post());
    }

    public function file(Request $request){
        if ("GET"==$request->method()){
            return view("test/file");
        }else{
            $file = $request->file('lyc');
//            return json($request->file());
            $file->move(upload_path().DIRECTORY_SEPARATOR.'123.'.$file->getUploadExtension());
//            return json($request->file('lyc'));
            return 'ok';
        }
    }

    public function router(Request $request){
        return __FUNCTION__;
    }

    public function routermethod(Request $request){
        return $request->method();
    }

    public function routerjson(Request $request){
        return json([$request->all(),$request->data,getenv('DB')]);
    }

    public function staticfile(Request $request,$file){
        return response()->file(upload_path().DIRECTORY_SEPARATOR.$file);
    }

    public function html(Request $request){
        return view('test/html',['name'=>'lyc','age'=>18,'sex'=>'nande']);
    }

    public function sessiontest(Request $request){
        $name = $request->get('name');
        $session = $request->session();
        if ($name){
            $session->put(['name'=>$name,'age'=>18]);
        }
        return response('hello '.$session->get('name'));
    }
    public function sessiondel(Request $request){
        $request->session()->flush();
        return __FUNCTION__.' all';

        $s = $request->session();
        $name = $s->pull('name');
        return $name.' logout';
    }

}
