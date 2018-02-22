@extends('layouts.base')

@section('header')
  <title>テスト</title>
@endsection
@section('content')

  <div class="container-fluid">
  @foreach($items as $item)
    <div>
      <div class="DetaiTitle text-muted">
        <span>{{ $item->id}}.名前{{ $item->title }}&nbsp{{ $item->date }}</span>
      </div>
      <div>
        <span>{{ $item->content }}</span>
      </div>
    </div>
  @endforeach
  </div>
     {{ $items->links() }}
@endsection
