<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bord;
use App\Bord_head;
use Illuminate\Support\Facades\Auth;

class BordController extends Controller
{
    public function index($id){
      session(['head_id' => $id ]);
      $title = Bord_head::get_title($id);
      if(!isTree()){
        $items = DB::table('bord')->where('head_id',$id)->orderBy('id','asc')->get();
      }else{
        $items = DB::table('bord')->where('head_id',$id)->orderBy('chain_key','asc')->get();
      }

      $user = Auth::user();
      return view('index',[
        'id'  => $id,
        'title' => $title,
        'items' => $items,
        'user' => $user,
      ]);
      /*
      $items = DB::table('bord')->simplePaginate(2);
      return view('index',[
        'items' => $items,
      ]);
      */
    }
    public function toggle($id){
        toggleTree();
        $para = '/sa/bord/' . session('head_id');
        return redirect($para);
    }

    public function entry(){
      return view('entry',[
        'id' => session('head_id'),
      ]);
    }
    public function add(Request $req){
        Bord::add(session('head_id'),Auth::id(),$req->input('comment'),0);
        $para = '/sa/bord/' . session('head_id');
        return redirect($para);
    }
    public function entry_reply($id){
      $item =  DB::table('bord')->where('head_id',session('head_id'))->where('id',$id)->first();

      $user = Auth::user();
      $title = Bord_head::get_title(session('head_id'));

      return view('entry_reply',[
        'item' => $item,
        'title' => $title,
        'user' => $user,
      ]);
    }
    public function add_reply(Request $req,$id){
      Bord::add(session('head_id'),Auth::id(),$req->input('comment'),$id);
      $para = '/sa/bord/' . session('head_id');
      return redirect($para);
    }

}
