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
      $reply_id = $reply;
      $id = Bord::generate_key($head_id);
      if($reply_id ==  0){
        $reply_id = $id;
      }

      DB::table('Bord')->insert(
        [
          'head_id' => $head_id,
          'id'  => $id,
          'writer_id' => $write,
          'content' => $content,
          'reply_id' => $reply_id,
        ]
      );
      $param = [
        'chain_key' =>  Bord::chain($id),
      ];
      DB::table('Bord')->where('head_id',$head_id)->where('id',$id)->update($param);
          //  DB::update('update bord set chain_key = :chain_key where head_id = :head_id and id = :id',$param);
      return DB::getPdo()->lastInsertId();

    }
    static public function generate_key($head_id){
      $param = ['head_id' => $head_id ];
      $id = DB::select('select max(id) as abc from bord where head_id =  :head_id  group by head_id',$param);
      if(empty($id)){
        $key = 1;
      }else{
      //  dd($id);
        foreach($id as $i){
          $key = $i->abc + 1;
        }
      }
      return $key;
    }
    static public function chain($id){
      $item =  DB::table('bord')->where('head_id',session('head_id'))->where('id',$id)->first();
  //    dd( $id . $item->reply_id);
      $key = sprintf("%04d",$item->id);


      while(true){

        if( $item->id != $item->reply_id){

              $key = sprintf("%04d",$item->reply_id) . "/" . $key;

             $item = DB::table('bord')->where('head_id',session('head_id'))->where('id',$item->reply_id)->first();

        }else{
          break;
        }

      }
      return $key;
    }
}
