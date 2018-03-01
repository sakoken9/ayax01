@extends('layouts.base')

@section('content')
<div class="container-fluid">
  <p class="h3">{{ $title }}</p>
  
<div class="DetaiTitle text-muted">
  <p><span>{{ $item->id }}.{{ $user->name }}.&nbsp{{ $item->created_at }} </span>
</div>
<div>
  <p><span>{{ $item->content }}</span><p>
</div>

<form action="" method="post">
  {{ csrf_field() }}
  <div class="form-group">
      <label for="exampleFormControlTextarea1">返信</label>
      <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">送信する</button>
</form>
@endsection
