@extends('layouts.base')

@section('header')
  <title>テスト</title>
@endsection
@section('content')

    <div class="container-fluid">
      <p class="h3">{{ $title }}</p>
    @foreach($items as $item)
      <?php
        if(isTree()){
          $deep = deep($item->chain_key);
          $deep = 3 * $deep;
        }else{
          $deep = 0;
        }
      ?>
      <div style="padding-left:{{ $deep }}%">
        <p>
        <div class="DetaiTitle text-muted">
          {{ $item->id}}.{{ $user->name }}.&nbsp{{ $item->created_at }} <a href="/sa/entry_reply/{{ $item->id }}">返信</a>
        </div>
        <div>
          {!! nl2br($item->content) !!}
        </div>
      </P>
      </div>
    @endforeach
    </div>


@endsection
