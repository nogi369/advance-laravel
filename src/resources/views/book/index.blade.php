<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>本の情報を一覧表示するファイル</title>
  @extends('layouts.default')
  <style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }
  tr:nth-child(odd) td{
    background-color: #FFFFFF;
  }
  td {
    padding: 25px 40px;
      background-color: #EEEEEE;
    text-align: center;
  }
  </style>
</head>

<body>
  @section('title', 'book.index.blade.php')

  @section('content')
  <table>
    <tr>
      <th>Books</th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td>
        {{$item->getTitle()}}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection
</body>

</html>