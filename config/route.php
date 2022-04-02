<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Webman\Route;

// test router
Route::any('/lyc',[app\controller\TestController::class,'router']);
Route::get('/lycget',[app\controller\TestController::class,'routermethod']);
Route::post('/lycpost',[app\controller\TestController::class,'routermethod']);
Route::any('/file/{file}',[app\controller\TestController::class,'staticfile']);
Route::get('/html',[app\controller\TestController::class,'html']);
Route::get('/session',[app\controller\TestController::class,'sessiontest']);
Route::get('/delsession',[app\controller\TestController::class,'sessiondel']);

// router group
Route::group('/group',function (){
    Route::any('/lyc',[app\controller\TestController::class,'router']);
    Route::get('/lycget',[app\controller\TestController::class,'routermethod']);
    Route::post('/lycpost',[app\controller\TestController::class,'routermethod']);
    Route::any('/lycjson',[app\controller\TestController::class,'routerjson']);
})->middleware([app\middleware\MiddleA::class,app\middleware\MiddleB::class]);