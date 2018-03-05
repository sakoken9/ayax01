<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    <link rel="stylesheet" href="/sa/css/common.css" type="text/css">
    <link href="/sa/css/bootstrap.min.css" rel="stylesheet">

    @yield('header')
  </head>
  <body>
    <header class="container">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 rounded-bottom">
        <a class="navbar-brand" href="#">掲示板</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="Navbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/sa">ホーム <span class="sr-only">(現位置)</span></a>
            </li>
            @if(isBord())
              <li class="nav-item">
                <a class="nav-link" href="/sa/entry">投稿</a>
              </li>
            @endif
            <?php
              if(isTree()){
                $temp = "レス順";
              }else{
                $temp = "ツリー";
              }
            ?>
            @if(isBord())
              <li class="nav-item">
                <form action="" method="post" id="submit">
                  {{ csrf_field() }}
                  <span class="nav-link pointer"  onclick='document.getElementById("submit").submit()'>{{ $temp }}</span>
                </form>
              </li>
            @endif
            @if(!isBord())
            <li class="nav-item">
              <a class="nav-link" href="/sa/entry_head">掲示板作成</a>
            </li>
            @endif
            <li class="nav-item">
            @if (Auth::check())
              <form action="/sa/logout" method="post" id="submit">
                {{ csrf_field() }}
                <span class="nav-link pointer"  onclick='document.getElementById("submit").submit()'>ログアウト</span>
              </form>
            @endif
          </li>
          @if( !Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="/sa/register">ユーザ登録</a>
            </li>
          @endif
          </ul>
          <form class="form-inline my-2 my-md-0">
            <input class="form-control mr-sm-2" type="search" placeholder="検索..." aria-label="検索...">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </nav>
    </header>
    <div class="container">

    @yield('content')

    @yield('footer')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/sa/js/bootstrap.min.js"></script>

  </body>
</html>
