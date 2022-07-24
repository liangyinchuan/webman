<?php
use Webman\Route;
use support\Request;

// 引用 route 中的路由文件
foreach (glob(base_path() . '/route/*.php') as $filename) {
include_once $filename;
}

// 回退路由
Route::fallback(function (Request $request) {
    $resp = [
        'status' => 0,
        'code' => 404,
        'info' => '404 not found',
        'data' => [],
        'now' => time(),
    ];
    return json($resp);
});

// 关闭默认路由
Route::disableDefaultRoute();
