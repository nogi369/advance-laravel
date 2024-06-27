<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>本の情報を一覧表示するファイル</title>
  @extends('layouts.default')
  <style>
    p {
      background-color: #289ADC;
      color: white;
      padding: 5px 10px;
      width: 500px;
    }
  </style>
</head>

<body>
  @section('title', 'session.blade.php')

  @section('content')
  <p>セッションに保存した値:{{ $data }}</p>
  <form action="/session" method="post">
    @csrf
    <input type="text" name="input">
    <button>送信</button>
  </form>
  @endsection
</body>

</html>