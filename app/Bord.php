<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bord extends Model
{
    protected $table = 'bord';
    // プライマリキー設定
    protected $primaryKey = ['head_id', 'id'];
    // increment無効化
    public $incrementing = false;

    static function add($head_id,$write,$content,$reply){
      DB::table('Bord')->insert(
        [
          'head_id' => $head_id,
          'writer_id' => $write,
          'content' => $content,
          'reply_id' => $reply,
        ]
      );

    }
}
