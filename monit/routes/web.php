<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\availabilityController;
use App\Http\Controllers\conrecController;
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


Route::get('newpagetest',[loginController::class,'newpagetest']);



Route::get('logout',[loginController::class,'logout'])->name('auth.logout');
Route::get('/auth/logout',[loginController::class,'logout'])->name('auth.logout');
Route::get('/back',[availabilityController::class,'back']);
Route::post('/auth/save',[loginController::class,'save'])->name('auth.save');
Route::post('/auth/check',[loginController::class,'check'])->name('auth.check');
Route::get('delete/{id}',[availabilityController::class,'destroy']);
Route::get('cancel/{id}/{avail_id}',[conrecController::class,'destroy']);
Route::post('update',[availabilityController::class,'update']);
Route::view('about','bout');
Route::get('/',[loginController::class,'home']);
// Route::get('/', function () {
//     return view('welcome',);
// });

Route::group(['middleware'=>['authcheck']],function(){
    Route::get('view_module/{id}',[loginController::class,'view_module']);
    Route::post('file_upload',[loginController::class,'file_upload']);
    Route::get('deleteStud/{student_id}/{subject_id}/{logweek_id}',[loginController::class,'deleteStudent']);
    Route::get('home',[loginController::class,'homesweet']);
    Route::post('statusC',[loginController::class,'statusC']);
    Route::post('subC',[loginController::class,'subC']);
    Route::post('statusU',[loginController::class,'statusU']);
    Route::post('subU',[loginController::class,'subU']);
    Route::post('searchh',[loginController::class,'asawhere']);
    Route::post('sAdd',[loginController::class,'sAdd']);
    Route::post('addweeklog',[loginController::class,'addweeklog']);
    Route::post('ssAdd',[conrecController::class,'ssAdd']);
    Route::post('save_logsheet',[loginController::class,'save_logsheet']);
    Route::get('logsheet/{logsheet_id}',[loginController::class,'logsheet_view']);
    Route::view('hum','welcome');
    
    Route::view('log','trylogin');
    Route::view('reg','tryregister');
    Route::view('instructordashboard','dashboardi');
    Route::get('edit/{id}',[availabilityController::class,'edit']);
     //adding subject
    Route::post('addsub',[conrecController::class,'addsub']);     
    Route::post('addreq',[conrecController::class,'store']);
    Route::get('updatereq/{id}/{avail_id}',[conrecController::class,'updatereq']);
    Route::get('cancelreq/{id}/{avail_id}',[conrecController::class,'cancelreq']);
    Route::get('cancelrej/{id}',[conrecController::class,'cancelrej']);
    Route::get('rejectreq/{id}',[conrecController::class,'rejectreq']);
    Route::get('deletereq/{id}',[conrecController::class,'deletereq']);
    Route::get('consultdone/{id}/{avail_id}',[conrecController::class,'trandone']);
   //student 
  
   Route::get('request/{id}',[loginController::class,'requestform']);
   Route::get('student',[loginController::class,'sdashboard']);
   Route::get('Subject/{id}/{logweek}/{week_id}',[loginController::class,'avail']);
   Route::get('Profile-',[loginController::class,'teacher_profile']);
   Route::get('Profile',[loginController::class,'student_profile']);
   Route::get('Notifications-',[loginController::class,'teacher_notif']);
   Route::get('Notifications',[loginController::class,'student_notif']);
   Route::get('Reports',[loginController::class,'teacher_rep']);
   Route::get('weeek/{id}/{week_id}',[loginController::class,'wweek']);
   Route::get('myRequests',[loginController::class,'myreq']);
   Route::post('distribute',[loginController::class,'distribute']);
   Route::post('retrieval',[loginController::class,'retrieval']);
   Route::get('undo_mark/{stud_id}/{log_sheet_id}',[loginController::class,'undo_mark']);
   Route::get('undo_mark_sub/{stud_id}/{log_sheet_id}',[loginController::class,'undo_mark_sub']);
   //instructor 
   Route::get('add',[availabilityController::class,'add']);
   Route::post('add',[availabilityController::class,'store']);
   Route::get('Instructor',[loginController::class,'idashboard']);//dashboard for instructor
   Route::get('/instructor/dashboard',[loginController::class,'idashboard']);
});

