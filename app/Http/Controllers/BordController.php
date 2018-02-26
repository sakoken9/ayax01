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
      $items = DB::table('bord')->where('head_id',$id)->get();
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
    public function entry(){
      return view('entry',[
        'id' => session('head_id'),
      ]);
    }
    public function add(Request $req){
        Bord::add(session('head_id'),2,$req->input('comment'),0);
        $para = '/sa/bord/' . session('head_id');
        return redirect($para);
    }
}
