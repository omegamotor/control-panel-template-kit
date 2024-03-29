<?php

use App\Livewire\Chats\ChatView;
use App\Livewire\Config\Email\ConfigEmailList;
use App\Livewire\Config\Pusher\ConfigPusherList;
use App\Livewire\Demo\Dashboard;
use App\Livewire\Files\FilesList;
use App\Livewire\Notifications\NotificationsList;
use App\Livewire\Tests\PdfTestTemplate;
use App\Livewire\Users\Forms\LoginUser;
use App\Livewire\Users\Forms\RegisterUser;
use App\Livewire\Users\UsersList;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/', Dashboard::class)->name('dashboard');

    // Users
    Route::get('/użytkownicy/lista', UsersList::class)->name('users.list');

    // Files
    Route::get('/pliki/lista', FilesList::class)->name('files.list');

    // Config
    Route::get('/ustawienia/mailing', ConfigEmailList::class)->name('config.email');
    Route::get('/ustawienia/pusher', ConfigPusherList::class)->name('config.pusher');

    // Notifications
    Route::get('/powiadomienia/lista', NotificationsList::class)->name('notifications.list');

    // Chats
    Route::get('/komunikator/{userId?}', ChatView::class)->name('chats.view');
});


// Users
Route::get('/login', LoginUser::class)->name('users.login');
Route::get('/register', RegisterUser::class)->name('users.register');

Route::get('/test/pdf', PdfTestTemplate::class)->name('test.pdf');


