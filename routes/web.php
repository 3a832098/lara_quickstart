<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    //show task
    Route::get('/', function () {
        return view('tasks');
    });
    //add task
    Route::post('/task',function(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //新增任務存入DB的程式碼
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });
    //del task
    Route::post('/task{task}',function(Request $request)
    {

    });

