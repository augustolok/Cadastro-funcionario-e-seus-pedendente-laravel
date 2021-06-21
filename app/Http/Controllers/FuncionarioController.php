<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\funcionarioRequest;
use App\Http\Requests\dependenteRequest;
use App\funcionario;
use App\dependente;
use DB;
use Redirect;


class FuncionarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $funcionario = funcionario::paginate(3);  
        return view("funcionario.index",compact('funcionario'));
            
    }
    public function new(){
        $mensagem = "1";
        return view("funcionario.store" ,compact('mensagem'));
    }
    public function store(funcionarioRequest $request){
        $mensagem = "202";
        $funcionarioData = $request->all();
        $data = $funcionarioData['datanacimento'];
        $dataagora = date("Y-m-d" , strtotime("-120 years"));
        
        if (strtotime($data) > strtotime($dataagora)) {
           if(isset(($_FILES['foto']))){
            if ($_FILES['foto']["size"]>200000) {
                $mensagem = "11";
                $funcionario = funcionario::paginate(3);  
                $funcionario = funcionario::paginate(3);
                return redirect()->back()->with('message', '11');
            }
            else{
            $extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "img/"; //define o diretorio para onde enviaremos o arquivo
            $caminho = $novo_nome;
            move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
            $funcionario = new funcionario();
            $funcionarioData['foto'] =  $caminho;
           
            $funcionario->Create($funcionarioData);
            $mensagem = "202";
            $funcionario = funcionario::paginate(3);  
            return view("funcionario.index",compact('funcionario','mensagem'));
            }
            
        }
        else {
            $mensagem = "12";
            $funcionario = funcionario::paginate(3);  
            return view("funcionario.store",compact('funcionario','mensagem'));
        }
        }
        else {
            $mensagem =  "13";

            $funcionario = funcionario::paginate(3);  
            return view("funcionario.store",compact('funcionario','mensagem'));
        }
        
        //return view("funcionario.store");
        
    }
    public function edit(funcionario $id){
        $funcionario = $id;
        //dd($id) ;
       
        $depedentes = dependente::where('id_funcionario', '=' ,$funcionario['id'])->get();
        
        
       
        
        return view("funcionario.edit", compact("funcionario","depedentes","data"));
    }
    public function update(funcionarioRequest $request ,$id){
        $funcionarioData = $request->all();
        //dd($request) ;
        $funcionario = funcionario::findOrFail($id);
        $funcionario -> update($funcionarioData);
        print "update com sucesso";
    }
    public function deleta(Request $request ,$id){
        $funcionarioData = $request->all();
        //dd($request) ;
        $funcionario = funcionario::findOrFail($id);
        $funcionario -> delete();
        print "removido com sucesso";
        $funcionario = funcionario::paginate(3);
        $mensagem = "602";
            $funcionario = funcionario::paginate(3);    
        return view("funcionario.index",compact('funcionario','mensagem'));
    }
    public function tudo(){
        //dd($request) ;
        DB::table('dependentes')->delete();
        DB::table('funcionarios')->delete();
        //$dependente = dependente::truncate();
        //$funcionario = funcionario::truncate();
        print "removido tudo com sucesso";
        $funcionario = funcionario::paginate(3);  
        return view("funcionario.index",compact('funcionario'));
    }
}
