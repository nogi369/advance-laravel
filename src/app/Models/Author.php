<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'nationality'];

    public function getDetail()
    {
      $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
      return $txt;
    }

    // メソッド名は、1対1 の関係で 1つのレコードしか取り出されないので、単数形の名前(book)にしている
    public function book(){
      return $this->hasOne('App\Models\Book');
    }

    // 複数のレコードと関連づけられているため、booksという名前のメソッドにしている
    public function books(){
      return $this->hasMany('App\Models\Book');
    }
}