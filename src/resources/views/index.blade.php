<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧ページ</title>
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
  @section('title', 'index.blade.php')

  @section('content')
  <table>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>age</th>
      <th>nationality</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
      <td>{{$author->id}}</td>
      <td>{{$author->name}}</td>
      <td>{{$author->age}}</td>
      <td>{{$author->nationality}}</td>
    </tr>
    @endforeach
  </table>
  @endsection
</body>

</html>