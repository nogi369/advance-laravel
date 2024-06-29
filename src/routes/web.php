<?php

use Illuminate\Support\Facades\Route;
use App\Models\Person;
use App\Models\Product;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [AuthorController::class, 'index']);
Route::get('/find', [AuthorController::class, 'find']);
Route::post('/find', [AuthorController::class, 'search']);
Route::get('/author/{author}', [AuthorController::class, 'bind']);
Route::get('/add', [AuthorController::class, 'add']);
Route::post('/add', [AuthorController::class, 'create']);
Route::get('/edit', [AuthorController::class, 'edit']);
Route::post('/edit', [AuthorController::class, 'update']);
Route::get('/delete', [AuthorController::class, 'delete']);
Route::post('/delete', [AuthorController::class, 'remove']);
Route::get('/verror', [AuthorController::class, 'verror']);
Route::get('/relation', [AuthorController::class, 'relate']);

Route::prefix('book')->group(function () {
Route::get('/', [BookController::class, 'index']);
Route::get('/add', [BookController::class, 'add']);
Route::post('/add', [BookController::class, 'create']);
});

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);

// id=1のレコードを論理削除
Route::get('/softdelete', function () {
    Person::find(2)->delete();
});
// 論理削除されたレコードの確認
Route::get('softdelete/get', function() {
  $person = Person::onlyTrashed()->get();
  dd($person);
});
// 削除されたレコードの復元
Route::get('softdelete/store', function() {
  $result = Person::onlyTrashed()->restore();
  echo $result;
});
// 論理削除したレコードの完全削除
Route::get('softdelete/absolute', function() {
  $result = Person::onlyTrashed()->forceDelete();
  echo $result;
});

Route::get('uuid',function() {
    $products = Product::all();
    foreach($products as $product){
        echo $product.'<br>';
    }
});