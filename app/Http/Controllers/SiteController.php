<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index()
    {
       //return "index";
       //$produtos = Produto::all();
       //return dd($produtos);
       $produtos = Produto::paginate(3);
      
       return view('site.home',compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug',$slug)->first();

        return view('site.details',compact('produto'));
    }

    public function categoria($id)
    {
    // 1. Pega os dados da Categoria (opcional, mas útil para mostrar o nome da categoria na tela)
      $categoria = Categoria::find($id);
      $produtos = Produto::where('id_categoria', $id)->get(); // Pode usar ->get() no lugar de paginate(3) se não quiser paginação agora
      return view('site.categoria', compact('produtos', 'categoria'));
    }
}
