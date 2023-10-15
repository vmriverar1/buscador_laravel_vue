<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('app');
});

Route::get('/posts', function(){
    $posts = Post::all();
    return response()->json([
        'posts' =>  $posts
    ]);
});

Route::post('/posts/search', function(){
    $posts = Post::where('title', 'like', '%'.request()->q.'%')
                    ->orwhere('content', 'like', '%'.request()->q.'%')
                    ->get();
    return response()->json([
        'post' => $posts
    ]);
});