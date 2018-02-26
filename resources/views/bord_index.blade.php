@extends('layouts.base')

@section('header')
  <title>テスト</title>
@endsection
@section('content')

    <div class="container-fluid">
    @foreach($items as $item)
      <div>
        <div>
          <a href="/sa/bord/{{ $item->id }}"><span>{{ $item->id }}&nbsp{{ $item->title }}</span></a>
        </div>
      </div>
    @endforeach
    </div>


@endsection
