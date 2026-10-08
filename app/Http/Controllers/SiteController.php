<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
       // return "index";
       //$produtos = Produto::all();
       //return dd($produtos);
       $produtos = Produto::paginate(3);
      
       return view('site.home',compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug');

        return view('site.details',compact('produto'));
    }
}
