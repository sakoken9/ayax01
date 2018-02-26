@extends('layouts.base')

@section('content')
<form action="" method="post">
  {{ csrf_field() }}
  <div class="form-group">
      <label for="text1">タイトル</label>
      <input type="text" class="form-control form-control-sm" id="text1" name="title">

    </div>
  <button type="submit" class="btn btn-primary">送信する</button>
</form>
@endsection
