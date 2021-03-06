<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * 物理数据
 * yjx
 */
Route::middleware('jwt.auth')->prefix('completion1')->group(function () {
    Route::post('completion1', 'PhysicsController@YJXphysics');//实验1答题（数据分析）
   // Route::get('pdf1', 'PhysicsController@pdf1');//实验1pdf
});

/**
 * @author yjx
 * 登录模块
 */
Route::prefix('users')->group(function () {
    Route::post('login', 'UsersController@login');  //用户登录
    Route::post('registered', 'UsersController@registered');  //用户注册
    Route::post('again', 'UsersController@again');  //修改用户密码
});
/**
 * @author yjx
 * 下拉框模块
 */
Route::prefix('show')->group(function () {
    Route::get('showlevel', 'PhysicsController@yjxshowxxlevel');  //查看层次下拉框
    Route::get('showyear', 'PhysicsController@yjxshowxxyear');  //查看级数下拉款
    Route::get('showclass', 'PhysicsController@yjxshowxxclass');  //查看班级下拉框
    Route::get('showspec', 'PhysicsController@yjxshowxxspec');  //查看专业下拉框

    Route::post('showxxallin', 'TeacherShowController@yjxshowxxallin');  //教师端3连查询

Route::middleware('jwt.auth')->group(function () {
    Route::post("selectstudent",'informationFindController@zlcSelectstudent');//查看个人学生信息
    Route::post("danbai","PendulumController@zlcDanbai");//单摆
    Route::post("js","PendulumController@zlcJs");//单摆计算题


});
