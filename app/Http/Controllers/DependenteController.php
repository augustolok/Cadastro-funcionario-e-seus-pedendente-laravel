<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\funcionarioRequest;
use App\Http\Requests\dependenteRequest;
use App\funcionario;
use App\dependente;

class DependenteController extends Controller
{
    public function index(funcionario $id){
        $funcionario = $id;
        var_dump($funcionario['id']);
        $depedentes = dependente::where('id_funcionario', '=' ,$funcionario['id']);
        return view("funcionario.edit", compact("funcionario"));
    }
    public function store(dependenteRequest $request){
        $dependenteData = $request->all();
        $data = $dependenteData['datanacimento'];
        $dataagora = date("Y-m-d" , strtotime("-120 years"));
        
        if (strtotime($data) > strtotime($dataagora)) {
        $dependente = new dependente();
           
        $dependente->Create($dependenteData);
        $mensagem =  "202";
        }
        else {
            $mensagem =  "13";
        }
       
        $funcionario = funcionario::findOrFail($dependenteData['id_funcionario']);
        $depedentes = dependente::where('id_funcionario', '=' ,$dependenteData['id_funcionario'])->get();
        
        return view("funcionario.edit", compact("funcionario","depedentes",'mensagem'));

    }
    public function deleta(Request $request ,$id){
        $dependenteData = $request->all();
        //dd($request) ;
        $dependente = dependente::findOrFail($id);
        //$dependente -> delete();
        $funcionario = funcionario::findOrFail($id);
        $depedentes = dependente::where('id_funcionario', '=' ,$id)->get();
        $mensagem =  "602";
        return view("funcionario.edit", compact("funcionario","depedentes",'mensagem'));
    }
    public function remove(Request $request,$id){
        $dependenteData = $request->all();
        if ($id != $dependenteData['id']) {
            $funcionario = funcionario::findOrFail($dependenteData['id_funcionario']);
            $depedentes = dependente::where('id_funcionario', '=' ,$dependenteData['id_funcionario'])->get();
            $mensagem =  "404";
            return view("funcionario.edit", compact("funcionario","depedentes",'mensagem'));
           
        }
        else {
        $funcionario = funcionario::findOrFail($dependenteData['id_funcionario']);
        $dependente = dependente::findOrFail($id);
        $dependente -> delete();
        $depedentes = dependente::where('id_funcionario', '=' ,$dependenteData['id_funcionario'])->get();
        $mensagem =  "602";
        return view("funcionario.edit", compact("funcionario","depedentes",'mensagem'));
        //return __CLASS__;
        }
    }
}
