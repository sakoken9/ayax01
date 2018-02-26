@extends('layouts.base')

@section('header')
  <title>テスト</title>
@endsection
@section('content')

    <div class="container-fluid">
      <p class="h3">{{ $title }}</p>
    @foreach($items as $item)
      <div>
        <div class="DetaiTitle text-muted">
          <span>{{ $item->id}}.{{ $user->name }}.&nbsp{{ $item->created_at }}</span>
        </div>
        <div>
          <span>{{ $item->content }}</span>
        </div>
      </div>
    @endforeach
    </div>


@endsection
