<?php

use App\Http\Controllers\RandomController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome', [
//         'heading' => 'Latest Listings',
//         'listings' => [
//             [
//             'id' => 1,
//             'title' => 'Listing One',
//             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quo quis temporibus ullam nostrum, voluptate eum, iusto aut repellendus aliquid corrupti! Consectetur quaerat accusantium unde qui quasi obcaecati aperiam quo?'
//             ],

//             [
//             'id' => 2,
//             'title' => 'Listing Two',
//             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quo quis temporibus ullam nostrum, voluptate eum, iusto aut repellendus aliquid corrupti! Consectetur quaerat accusantium unde qui quasi obcaecati aperiam quo?'
//             ]

//         ],

//         'listings2' => [

//             [
//             'id' => 3,
//             'title' => 'Listing Three',
//             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quo quis temporibus ullam nostrum, voluptate eum, iusto aut repellendus aliquid corrupti! Consectetur quaerat accusantium unde qui quasi obcaecati aperiam quo?'
//             ],

//             [
//                 'id' => 4,
//                 'title' => 'Listing Four',
//                 'description' => '333 Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quo quis temporibus ullam nostrum, voluptate eum, iusto aut repellendus aliquid corrupti! Consectetur quaerat accusantium unde qui quasi obcaecati aperiam quo?'
//             ]
//         ]
//     ]);
// });



Route::get('/', [RandomController::class, 'index'])->name('random.index');

Route::get('/create', [RandomController::class, 'create'])->name('random.create');

Route::post('/store', [RandomController::class, 'store'])->name('random.store');

Route::get('/edit/{id}', [RandomController::class, 'edit'])->name('random.edit');

Route::post('/update', [RandomController::class, 'update'])->name('random.update');

Route::get('/delete/{id}', [RandomController::class, 'delete'])->name('random.delete');



Route::get('/restore/{id}', [RandomController::class, 'restore'])->name('random.restore');

Route::get('/destroy/{id}', [RandomController::class, 'destroy'])->name('random.destroy');



