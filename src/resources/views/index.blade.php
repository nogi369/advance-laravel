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

    svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
  </style>
</head>

<body>
  @section('title', 'index.blade.php')

  @section('content')
  <table>
    <tr>
      <th>Data</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
      <td>
        {{$author->getDetail()}}
      </td>
    </tr>
    @endforeach
  </table>
  {{ $authors->links() }}
  @endsection
</body>

</html>