<?php


/* --------------------- Common/User Routes START -------------------------------- */

Route::get('/', function () {
    return view('home');
});

Auth::routes([ 'verify' => true ]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/* --------------------- Common/User Routes END -------------------------------- */

/* ----------------------- Teacher Routes START -------------------------------- */

Route::prefix('/teacher')
    ->name('teacher.')
    ->namespace('Teacher')
    ->group(function(){
    
    /**
     * Teacher Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });

    //Route::get('/dashboard','HomeController@index')->name('home')->middleware('guard.verified:teacher,teacher.verification.notice');
    Route::get('','HomeController@index')->name('home');

    Route::middleware('auth:teacher')->group(function () {

        /*-------------- Exam Routes --------------------*/
        Route::get('/exams','ExamController@index')->name('exams');
        Route::get('/exams/new/{id?}','ExamController@create')->name('exams.new');
        Route::post('/exams/store','ExamController@store')->name('exams.store');
        Route::post('/exams/edit/{id}','ExamController@edit')->name('exams.edit');
        Route::delete('/exams/destroy/{id}','ExamController@destroy')->name('exams.destroy');

        /*-------------- Question Routes --------------------*/
        Route::get('/question/{exam_id}','QuestionController@getQuestions')->name('question.getQuestions');
        Route::post('/question','QuestionController@store')->name('question.store');
        Route::delete('/question/{exam_id}/{id}','QuestionController@destroy')->name('question.destroy');

        /*-------------- Room Routes --------------------*/
        Route::get('/rooms','RoomController@index')->name('rooms');
        Route::post('/rooms/store','RoomController@store')->name('rooms.store');
        Route::post('/rooms/update/{id}','RoomController@update')->name('rooms.update');
        Route::post('/rooms/replaceIsDefault/{id}','RoomController@replaceIsDefault')->name('rooms.update.isDefault');
        Route::delete('/rooms/destroy/{id}','RoomController@destroy')->name('rooms.destroy');

        /*-------------- Room Routes --------------------*/
        Route::get('/notifications','NotificationController@index')->name('notifications');

        /*-------------- Notification Routes --------------------*/
        Route::post('/notifications/store','NotificationController@store')->name('notification.store');
        Route::delete('/notifications/destroy/{id}','NotificationController@destroy')->name('notification.destroy');

        /*-------------- Activity Start Routes --------------------*/
        Route::get('/activityStart','ActivityStartController@index')->name('activityStart');
        Route::get('/getStudent/{exam_broadcast_id}','ActivityStartController@getStudent')->name('getStudent');
        Route::post('/activityFinish','ActivityStartController@activityFinish')->name('activityFinish');
        Route::post('/cloneAnswers','ActivityStartController@cloneAnswers')->name('cloneAnswers');

        /*-------------- Reports Routes --------------------*/
        Route::get('/reports','ReportController@index')->name('reports');
        Route::get('/reports/{id}','ReportController@show')->name('reports.show');


    });





});



/* ----------------------- Teacher Routes END -------------------------------- */

/* ----------------------- Student Routes START -------------------------------- */
Route::prefix('/student')
    ->name('student.')
    ->namespace('Student')
    ->group(function(){

        Route::namespace('Auth')->group(function(){

            //Login Routes
            Route::get('/login','LoginController@showLoginForm')->name('login');
            Route::post('/login','LoginController@login');
            Route::post('/logout','LoginController@logout')->name('logout');

            //Register Routes
            Route::get('/register','RegisterController@showRegistrationForm')->name('register');
            Route::post('/register','RegisterController@register');

            //Forgot Password Routes
            Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

            //Reset Password Routes
            Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

            // Email Verification Route(s)
            Route::get('email/verify','VerificationController@show')->name('verification.notice');
            Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
            Route::get('email/resend','VerificationController@resend')->name('verification.resend');

        });

        Route::get('','HomeController@index')->name('home');

        Route::middleware('auth:student')->group(function (){

            /*-------------- Classroom Routes --------------------*/
            Route::get('/classrooms/{id}','ClassroomController@show')->name('classroom.show');
            Route::post('/classrooms/store','ClassroomController@store')->name('classroom.store');
            Route::delete('/classrooms/destroy/{id}','ClassroomController@destroy')->name('classroom.destroy');



        });

        Route::get('','HomeController@index')->name('home');
});
