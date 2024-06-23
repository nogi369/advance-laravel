<?php

namespace App\Http\Controllers;

// Eloquentを使用できるようにAuthorモデルを読み込む
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  // データ一覧ページの表示
  public function index()
  {
      $authors = Author::all();
      return view('index', ['authors' => $authors]);
  }

  // データ追加用ページの表示
  public function add()
  {
    return view('add');
  }

  // データ追加機能
  // Request $request = リクエストボディを受け取る
  public function create(Request $request){
    // リクエストの全ての情報を取得する
    $form = $request->all();
    // 追加機能 = Eloquentのcreateメソッドを使用
    Author::create($form);
    return redirect('/');
  }

  // データ編集ページの表示
  public function edit(Request $request){
    $author = Author::find($request->id);
    return view('edit', ['form' => $author]);
  }

  // 更新機能
  public function update(Request $request)
  {
    $form = $request->all();
    unset($form['_token']);
    Author::find($request->id)->update($form);
    return redirect('/');
  }

  // データ編集ページの表示
  public function delete(Request $request){
    $author = Author::find($request->id);
    return view('delete', ['author' => $author]);
  }

  // 削除機能
  public function remove(Request $request)
  {
    Author::find($request->id)->delete();
    return redirect('/');
  }
}
