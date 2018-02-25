<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bord_head;

class Bord_headController extends Controller
{
    public function index(){
      $items = Bord_head::all();
      return view('bord_index',[
        'items' => $items,
      ]);
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
