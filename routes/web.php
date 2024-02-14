<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StartQuizController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\EmailController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('about/{detail_id}', [FrontendController::class, 'about']);
Route::get('course_detail/{course_detail}', [FrontendController::class, 'course_detail'])->name('courses.detail');
Route::get('contact', [FrontendController::class, 'contact']);
Route::get('video', [FrontendController::class, 'video']);
Route::get('gallery', [FrontendController::class, 'gallery']);
Route::get('new-license', [FrontendController::class, 'new_license']);
Route::get('renew-license', [FrontendController::class, 'renew_license']);
Route::get('internationa-license', [FrontendController::class, 'internationa_license']);
Route::get('theory', [FrontendController::class, 'theory']);
Route::get('practical', [FrontendController::class, 'practical']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('course', CourseController::class);
    Route::get('/course_search', [CourseController::class, 'course_search']);
    Route::post('/course/{id}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::post('/course/{id}/{cid}/unenroll', [CourseController::class, 'unenroll'])->name('course.unenroll');
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::get('question/create/{id}', [QuestionController::class, 'create'])->name('create_quiz_qns');
    Route::post('question/import', [QuestionController::class, 'import'])->name('question.import');
    Route::resource('rating', RatingController::class);
    Route::resource('result', ResultController::class);
    Route::get('/quiz_search', [QuestionController::class, 'quiz_search']);
    Route::get('/get_access_code', [QuizController::class, 'get_accesscode']);
    Route::resource('student', StudentController::class);
    Route::post('/student/{id}/enroll', [StudentController::class, 'enroll'])->name('student.enroll');
    Route::post('/student/{id}/{sid}/unenroll', [StudentController::class, 'unenroll'])->name('student.unenroll');
    Route::get('/search', [StudentController::class, 'search']);
    Route::resource('settings', SettingsController::class);
    Route::resource('slide', SlidesController::class);
    Route::resource('blog', BlogController::class);


});
Route::get('/quiz_search_active', [QuestionController::class, 'quiz_search_active']);
Route::get('/register', [StudentController::class, 'register_index'])->name('register_view');
Route::post('/startquiz', [StudentController::class, 'register_student'])->name('startquiz');
Route::get('courses/{course_id}/quizzes/{quiz_id}', [StartQuizController::class, 'quiz_details'])->name('get_quiz');
Route::post('courses/{course_id}/quizzes/{quiz_id}', [StartQuizController::class, 'start_quiz'])->name('start_quiz');
Route::get('courses/{course_id}/quizzes/{quiz_id}/qns-{qns_id}', [StartQuizController::class, 'get_question'])->name('question_link');
Route::post('courses/{course_id}/quizzes/{quiz_id}/qns-{qns_id}/action', [StartQuizController::class, 'submit_question']);
Route::post('courses/{course_id}/quizzes/{quiz_id}/qns-{qns_id}', [StartQuizController::class, 'submit_question']);
Route::get('courses/{course_id}/quizzes/{quiz_id}/qns-{qns_id}/action', [StartQuizController::class, 'get_question_number'])->name('question_link_number');
Route::get('courses/{course_id}/quizzes/{quiz_id}/quiz-review',  [StartQuizController::class, 'get_quiz_result'])->name('quiz_result');
Route::get("courses/{course_id}/quizzes/{quiz_id}/quiz-review/email", [StartQuizController::class, "sendResultEmail"])->name("send_result_email");
Route::post('/quiz/rate', [RatingController::class, 'studentRate'])->name('quiz.rate');