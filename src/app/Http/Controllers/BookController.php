<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  // 本(Book)に関するデータを一覧表示する
  public function index(){
      $items = Book::all();
      return view('book.index', ['items'=>$items]);
  }
  public function add(){
    // createアクションで送信された値をBooksテーブルに追加？
    return view('book.add');
  }
  // 新規投稿する
  public function create(Request $request){
      $this->validate($request, Book::$rules);
      $form = $request->all();
      Book::create($form);
      return redirect('/book');
  }
}