<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bord_head extends Model
{
    protected $table = 'bord_head';


    static function add($writer,$title){
      $bord = new Bord_head();
      $bord->writer_id = $writer;
      $bord->title = $title;
      $bord->save();
      return $bord->id;
    }
    static function get_title($id){
      $bords = Bord_head::find($id);
      return $bords->title;
    }
}
