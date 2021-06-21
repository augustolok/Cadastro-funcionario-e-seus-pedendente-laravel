@extends('layouts.app')
   
  @section('content')  
  <div class="container">
    <!-- <form action="{{route('Funcionarios.update',['id' => $funcionario->id ])}}" method="post"> -->
    <h4>Dependentes</h4>
    <br>
    <table class="table">
        <p>
        <img src="/img/{{$funcionario->foto}}" alt="Italian Trulli" width="77px" height="77px" style="border: 1px solid black;">
        <br>
        <lable id="">Nome:</lable>
           
            {{$funcionario->nome}}
            <br>
          
        </p>

        <p>
            <lable id="">datanacimento:</lable>
            {{$funcionario->datanacimento}}
            <br>
            
        </p>
        <p>
            <lable id="">Email:</lable>
            {{$funcionario->email}}
            <br>
            
        </p>
    </table>
    <form action="{{route('depedente.store')}}" method="post" class="form-inline">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
            <input type="hidden" name="id_funcionario" value="{{$funcionario->id}}">
            <lable id="">Nome:</lable>
                <input type="text" name="name" id="nome" value="{{old('name')}}">
                <br>
                @if ($errors->has('nome'))
                {{$errors->first('nome')}}
                @endif
            </div>
            <div class="form-group">
                <lable id="">datanacimento:</lable>
                <input type="date" name="datanacimento" id="datanacimento" value="{{old('datanacimento')}}">
                
                <br>
                @if ($errors->has('datanacimento'))
                {{$errors->first('datanacimento')}}
                @endif
            </div>
        <p>
        <div class="form-group">
            <input type="submit" value="Adicionar" class="btn btn-primary ml-2">
            </div>
        </p>
    </form>
    @if (!empty($mensagem))
            @if ($mensagem == 202)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Cadastro Realizado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($mensagem == 602)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Removido registro.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($mensagem == 13)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Pessoa com 120 Anos ou mais, não pode ser cadastrado!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($mensagem == 404)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong>Houve violação dos DADOS!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @endif
    <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nome</th>
                    <th>datanacimento</th>
                    <th>ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depedentes as $r)
                <tr>
                                <td>{{$r->id}}</td>
                                <td>{{$r->name}}</td>
                                <td>{{$r->datanacimento}}</td>
                                <td>
                               
                                
                                <div class="modal" id="myModal{{$r->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Realmente Deseja fazer isso?</h4>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            Caso click em Excluir  os dados serão apagando!
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <form action=" {{route('depedente.deletar',['id' => $r->id ])}}" method="post" class="form-inline">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="id" value="{{$r->id}}">
                                                <input type="hidden" name="id_funcionario" value="{{$funcionario->id}}">
                                        
                                                <button type="submit"  class="btn btn-segundary mr-5">Excluir</button>
                                            </form>
                                            <button type="button" class="btn btn-danger ml-5" data-dismiss="modal" onclick='fecha()'>Não</button>
                                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                    
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$r->id}}"> Excluir</a>
                                
                                </td>
                </tr>
                @endforeach
    </table>
  </div>
  @endsection
