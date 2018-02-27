<?php

  if(!function_exists('isBord')){
    function isBord(){
      return strpos(Request::path(),Config::get('const.BORD'));
    }
  }
