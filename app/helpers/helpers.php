<?php



if(!function_exists('isBord')){
  function isBord(){
    return strpos(Request::path(),Config::get('const.BORD'));
  }

}
if(!function_exists('toggleTree')){
  function toggleTree(){
    if(session('tree',false)){
      session(['tree'=>false]);
    }else{
      session(['tree'=>true]);
    }
    //dd(session('tree',false));
  }
}
if(!function_exists('isTree')){
  function isTree(){
    return session('tree',false);
  }
}
if(!function_exists('deep')){
  function deep($chain){
    return substr_count($chain,'/');
  }
}
