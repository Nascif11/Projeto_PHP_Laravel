<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;
class DashboardController extends Controller
{
    public function index(){
        $usuarios = User::all()->count();
        //grafico
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*)as total')
        ])
        ->groupBy('ano')
        ->orderBY('ano','asc')
        ->get();

        foreach($userData as $user){
            $ano[] = $user -> ano;
            $total[] = $user->total;
        }

        $userLabel = " ' Comparativo de cadastro de ususarios'";
        $userAno = implode(',',$ano);
        $userTotal = implode(',',$total);

        $catData = Categoria::all();

        foreach($catData as $cat){
            $catNome[] = "'".$cat ->nome."'";
            $catTotal[]= Produto::where('id_categoria',$cat ->id)->count();

        }

        $catLabel = implode(',',$catNome);
        $catTotal = implode(',',$catTotal);


        return view('admin.dashboard',compact('usuarios','userLabel','userAno','userTotal','catLabel','catTotal'));
    }
}
