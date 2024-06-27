<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Eloquentを使用できるようにAuthorモデルを読み込む
use App\Models\Author;
// フォームリクエストの読み込み
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
  // データ一覧ページの表示
  public function index()
  {
    // $authors = Author::all();
    // $authors = Author::simplePaginate(4);
    $authors = Author::Paginate(4);
    // dd($authors);
    return view('index', ['authors' => $authors]);
  }

  public function find()
  {
    return view('find', ['input' => '']);
  }

  public function search(Request $request)
  {
    $item = Author::where('name', 'LIKE',"%{$request->input}%")->first();
    // $item = Author::where('name', $request->input)->first();
    $param = [
        'input' => $request->input,
        'item' => $item
    ];
    return view('find', $param);
  }
  // bindアクション
  public function bind(Author $author)
  {
    $data = [
        'item'=>$author,
    ];
    return view('author.binds', $data);
  }

  // データ追加用ページの表示
  public function add()
  {
    return view('add');
  }

  // データ追加機能
  // Request $request = リクエストボディを受け取る
  public function create(AuthorRequest $request){
    // リクエストの全ての情報を取得する
    $form = $request->all();
    // dd($form);
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
  public function update(AuthorRequest $request)
  {
    $form = $request->all();
    // dd($form);
    unset($form['_token']);
    Author::find($request->id)->update($form);
    return redirect('/');
  }

  // データ削除ページの表示
  public function delete(Request $request){
    $author = Author::find($request->id);
    return view('delete', ['author' => $author]);
  }

  // 削除機能
  public function remove(Request $request)
  {
    // dd($request->all());
    Author::find($request->id)->delete();
    return redirect('/');
  }

  // バリデーションエラー
  public function verror()
  {
  return view('verror');
  }

  // authorsテーブルのデータを返すアクション
  public function relate(Request $request)
  {
      // $items = Author::all();
      // return view('author.index', ['items' => $items]);
      $hasItems = Author::has('book')->get();
      $noItems = Author::doesntHave('book')->get();
      $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
      return view('author.index',$param);
  }
}
