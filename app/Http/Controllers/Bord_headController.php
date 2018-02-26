<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bord_head;
use Illuminate\Support\Facades\Auth;


class Bord_headController extends Controller
{
    public function index(){
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
            Bord_head::add(1,$req->input('title'));
      return redirect('/sa');
    }
}
