<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bord;

class BordController extends Controller
{
    public function index(Request $req){
      $items = DB::table('bord')->simplePaginate(2);
      return view('index',[
        'items' => $items,
      ]);
    }
}
