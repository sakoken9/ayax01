@extends('layouts.base')

@section('content')
<form action="" method="post">
  {{ csrf_field() }}
  <div class="form-group">
      <label for="exampleFormControlTextarea1">コメント</label>
      <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">送信する</button>
</form>
@endsection
