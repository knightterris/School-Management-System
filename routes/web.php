<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DirectController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\MyMessageController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\PendingUserController;
use App\Http\Controllers\MyAttendanceController;
use App\Http\Controllers\Teacher\PageController;
use App\Http\Controllers\Student\StudentPageController;
use App\Http\Controllers\Teacher\TeacherClassController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Teacher\TeacherProfileController;


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

});

    Route::get('loginPage',[DirectController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[DirectController::class,'registerPage'])->name('auth#registerPage');
    Route::get('pendingPage',[DirectController::class,'pendingPage'])->name('auth#pendingPage');
    Route::get('rejectPage',[DirectController::class,'rejectPage'])->name('auth#rejectPage');

    Route::middleware(['main_page'])->group(function(){
        Route::get('/about',[MainPageController::class,'aboutPage'])->name('main#aboutPage');
        Route::get('/',[DirectController::class,'mainPage'])->name('mainPage');
        Route::get('/blog',[MainPageController::class,'blogPage'])->name('main#blogPage');
        Route::get('/scholarship',[MainPageController::class,'scholarshipPage'])->name('main#scholarshipPage');
        Route::get('/contact',[MainPageController::class,'contactPage'])->name('main#contactPage');
        Route::post('create/message',[MyMessageController::class,'createMessage'])->name('main#createMessage');
    });

    Route::middleware(['superAdmin_auth'])->group(function(){
        //homepage
        Route::prefix('superAdmin')->group(function(){
            Route::get('homePage',[DirectController::class,'superHomepage'])->name('super#homePage');
            Route::get('createBookPage',[DirectController::class,'createBookPage'])->name('super#createBookPage');
            Route::get('createUserPage',[SuperAdminController::class,'createUserPage'])->name('super#createUserPage');
            Route::post('createUser',[SuperAdminController::class,'createUser'])->name('super#createUser');
            Route::get('updateUserPage/{id}',[SuperAdminController::class,'updateUserPage'])->name('super#updateUserPage');
            Route::post('updateUser/{id}',[SuperAdminController::class,'updateUser'])->name('super#updateUser');
            Route::get('deleteUser/{id}',[SuperAdminController::class,'deleteUser'])->name('super#deleteUser');
            //account
            Route::prefix('account')->group(function(){
                Route::get('profilePage',[SuperAdminController::class,'profilePage'])->name('super#profilePage');
                Route::get('editProfilePage',[SuperAdminController::class,'editProfilePage'])->name('super#editProfilePage');
                Route::post('updateProfile/{id}',[SuperAdminController::class,'updateAccount'])->name('super#updateAccount');
                Route::get('passwordChangePage',[SuperAdminController::class,'passwordPage'])->name('super#passwordPage');
                Route::post('changepassword',[SuperAdminController::class,'changePassword'])->name('super#changePassword');
            });
            //category
            Route::prefix('category')->group(function(){
                Route::post('createCategory',[CategoryController::class,'createCategory'])->name('super#createCategory');
                Route::get('deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('super#deleteCategory');
                Route::get('deleteAllCategory',[CategoryController::class,'deleteAllCategory'])->name('super#deleteAllCategory');
            });
            //books
            Route::prefix('book')->group(function(){
                Route::post('createBook',[BookController::class,'createBook'])->name('super#createBook');
                Route::get('deleteBook/{id}',[BookController::class,'deleteBook'])->name('super#deleteBook');
                Route::get('deleteAllBooks',[BookController::class,'deleteAllBook'])->name('super#deleteAllBook');
                Route::get('readBook/{id}',[BookController::class,'readBook'])->name('super#readBook');
            });
            //class
            Route::prefix('class')->group(function(){
                Route::get('createClassPage',[MyClassController::class,'createClassPage'])->name('super#createClassPage');
                Route::post('createClass',[MyClassController::class,'createClass'])->name('super#createClass');
                Route::get('deleteAllClasses',[MyClassController::class,'deleteAllClasses'])->name('super#deleteAllClasses');
                Route::get('deleteClass/{id}',[MyClassController::class,'deleteClass'])->name('super#deleteClass');
                Route::get('updateClassPage/{id}',[MyClassController::class,'updateClassPage'])->name('super#updateClassPage');
                Route::post('updateClass/{id}',[MyClassController::class,'updateClass'])->name('super#updateClass');
            });
            //timetable
            Route::prefix('timetable')->group(function(){
                Route::get('createTimetablePage',[TimeTableController::class,'createTimetablePage'])->name('super#timeTablePage');
                Route::post('createTimeTable',[TimeTableController::class,'creatTimeTable'])->name('super#createTimeTable');
                Route::get('deleteAllTimeTable',[TimeTableController::class,'deleteAllTimeTable'])->name('super#deleteAllTimeTable');
                Route::get('updateTimetablePage/{id}',[TimeTableController::class,'updateTimetablePage'])->name('super#updateTimetablePage');
                Route::post('updateTimetable/{id}',[TimeTableController::class,'updateTimeTable'])->name('super#updateTimeTable');
                Route::get('deleteTimetable/{id}',[TimeTableController::class,'deleteTimetable'])->name('super#deleteTimetable');
            });
            //pending user
            Route::prefix('pendingUser')->group(function(){
                Route::get('listPage',[PendingUserController::class,'listPage'])->name('super#listPage');
                Route::post('change/status/{id}',[PendingUserController::class,'changeStatus'])->name('super#changeStatus');
            });
            //project
            Route::prefix('project')->group(function(){
                Route::get('page',[ProjectController::class,'projectPage'])->name('super#projectPage');
                Route::post('createProject',[ProjectController::class,'createProject'])->name('super#createProject');
                Route::get('deleteAllProject',[ProjectController::class,'deleteAllProject'])->name('super#deleteAllProject');
                Route::get('deleteProject/{id}',[ProjectController::class,'deleteProject'])->name('super#deleteProject');
            });
            //payment
            Route::prefix('payment')->group(function(){
                Route::get('listPage',[DirectController::class,'paymentListPage'])->name('super#paymentListPage');
                Route::get('changePaymentPage/{id}',[DirectController::class,'changePaymentPage'])->name('super#changePaymentPage');
                Route::post('change/status/Payment/{id}',[DirectController::class,'changePayment'])->name('super#changePayment');
            });
            //year
            Route::prefix('year')->group(function(){
                Route::get('list',[YearController::class,'yearListPage'])->name('super#yearListPage');
                Route::post('createYear',[YearController::class,'createYear'])->name('super#createYear');
                Route::get('deleteYear/{id}',[YearController::class,'deleteYear'])->name('super#deleteYear');
            });
            //course
            Route::prefix('course')->group(function(){
                Route::get('courseList',[CourseController::class,'courseListPage'])->name('super#courseListPage');
                Route::post('create/course',[CourseController::class,'createCourse'])->name('super#createCourse');
                Route::get('delete/course/{id}',[CourseController::class,'deleteCourse'])->name('super#deleteCourse');
            });
            //attendance
            Route::prefix('attendance')->group(function(){
                Route::get('list/page',[MyAttendanceController::class,'attendanceList'])->name('super#attendanceList');
                Route::post('change/status/{id}',[MyAttendanceController::class,'changeAttendance'])->name('super#changeAttendance');
            });
            //message
            Route::prefix('message')->group(function(){
                Route::get('allMessage/list/page',[MyMessageController::class,'messageList'])->name('super#messageList');
                Route::get('read/message/{id}',[MyMessageController::class,'readMessage'])->name('super#readMessage');
                Route::get('delete/all/messages',[MyMessageController::class,'deleteAllMessage'])->name('super#deleteAllMessage');
            });
        });

    });

    Route::middleware(['admin_auth'])->group(function(){
        Route::get('teacher/homePage',[PageController::class,'teacherHomePage'])->name('teacher#homePage');
        //profile
        Route::prefix('teacher')->group(function(){
            Route::get('myProfile',[PageController::class,'teacherProfile'])->name('teacher#profilePage');
            Route::get('update/profile/page',[PageController::class,'updateProfilePage'])->name('teacher#updateProfilePage');
            Route::get('password/change/page',[PageController::class,'passwordPage'])->name('teacher#passwordPage');
            Route::post('update/profile/{id}',[TeacherProfileController::class,'updateProfile'])->name('teacher#updateTeacherProfile');
            Route::post('change/password',[TeacherProfileController::class,'changePassword'])->name('teacher#changePassword');
        });
        //class
        Route::prefix('teacher/class')->group(function(){
            Route::get('list',[PageController::class,'classListPage'])->name('teacher#classListPage');
            Route::post('change/situation/{id}',[TeacherClassController::class,'changeSituation'])->name('teacher#changeSituation');
        });
        //timetable
        Route::prefix('teacher/timetable')->group(function(){
            Route::get('timetable/page',[PageController::class,'timetablePage'])->name('teacher#timeTablePage');
            Route::post('create/timetable',[TeacherClassController::class,'createTimetable'])->name('teacher#createTimetable');
            Route::get('delete/all',[TeacherClassController::class,'deleteAllTimetable'])->name('teacher#deleteAllTimetable');
            Route::get('delete/timetable/{id}',[TeacherClassController::class,'deleteTimetable'])->name('teacher#deleteTimetable');
        });
        //attendance
        Route::prefix('teacher/attendance')->group(function(){
            Route::get('list/page',[PageController::class,'attendanceListPage'])->name('teacher#attendanceListPage');
            Route::post('change/attendance/{id}',[TeacherClassController::class,'changeAttendance'])->name('teacher#changeAttendance');
        });
        //project
        Route::prefix('teacher/class')->group(function(){
            Route::get('project/list/page',[PageController::class,'projectListPage'])->name('teacher#projectListPage');
            Route::post('create/project',[TeacherClassController::class,'createProject'])->name('teacher#createProject');
            Route::get('delete/all/project',[TeacherClassController::class,'deleteAllProject'])->name('teacher#deleteAllProject');
            Route::get('delete/project/{id}',[TeacherClassController::class,'deleteProject'])->name('teacher#deleteProject');
        });
        //payment
        Route::get('teacher/payment/page',[PageController::class,'paymentPage'])->name('teacher#paymentPage');
        //books
        Route::get('teacher/book/list/page',[PageController::class,'bookListPage'])->name('teacher#bookListPage');
        Route::get('read/book/{id}',[PageController::class,'readBook'])->name('teacher#readBook');
    });

    Route::middleware(['student_auth'])->group(function(){
        Route::get('student/homePage',[StudentPageController::class,'studentHomePage'])->name('student#homePage');
        Route::prefix('student')->group(function(){

            Route::prefix('profile')->group(function(){
                Route::get('myProfile',[StudentPageController::class,'profilePage'])->name('student#profilePage');
                Route::get('edit/profile',[StudentPageController::class,'editProfilePage'])->name('student#editProfilePage');
                Route::post('update/profile/{id}',[StudentPageController::class,'updateStudentProfile'])->name('student#updateProfile');
                Route::get('change/password/page',[StudentPageController::class,'changePasswordPage'])->name('student#changePasswordPage');
                Route::post('change/password',[StudentPageController::class,'changePassword'])->name('student#changePassword');
            });
            Route::get('book/list/page',[StudentPageController::class,'bookListPage'])->name('student#bookListPage');
            Route::get('read/book/page/{id}',[StudentPageController::class,'readBookPage'])->name('student#readBookPage');
            Route::get('project/list/page',[StudentPageController::class,'projectListPage'])->name('student#projectListPage');
            Route::get('class/list/page',[StudentPageController::class,'classListPage'])->name('student#classListPage');
            Route::get('timetable/list/page',[StudentPageController::class,'timetablePage'])->name('student#timetableListPage');
        });
    });


