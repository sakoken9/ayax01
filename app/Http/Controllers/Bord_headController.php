<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bord_head;
use App\Bord;
use Illuminate\Support\Facades\Auth;


class Bord_headController extends Controller
{
    public function index(){
      if(isBord()){
      
      }
      if( Auth::check()){
        $items = Bord_head::all();
        return view('bord_index',[
          'items' => $items,
        ]);
      }else{
        return redirect('/login');
      }
      /*
      $items = DB::table('bord')->simplePaginate(2);
      return view('index',[
        'items' => $items,
      ]);
      */
    }
    public function entry(){
      return view('entry_bord');
    }

    public function add(Request $req){
            $head_id = Bord_head::add(Auth::id(),$req->input('title'));

    session(['head_id' =>   $head_id ]);
            $id = Bord::add($head_id,Auth::id(),$req->input('comment'),0);
      return redirect('/sa/bord/' . $head_id);
    }
}
