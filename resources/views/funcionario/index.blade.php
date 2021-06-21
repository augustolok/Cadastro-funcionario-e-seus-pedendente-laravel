@extends('layouts.app')
<style>
.dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
.dotgreen{
  height: 25px;
  width: 25px;
  background-color: green;
  border-radius: 50%;
  display: inline-block;
}
</style>
  @section('content')  
  <div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Realmente Deseja fazer isso?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         Caso click em sim todos os dados serão apagando!
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="{{route('Funcionarios.remove.tudo')}}" class="btn btn-segundary mr-5" >sim</a>
          <button type="button" class="btn btn-danger ml-5" data-dismiss="modal" onclick='fecha()'>Não</button>
        </div>
        
      </div>
    </div>
  </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>foto</th>
                    <th>nome</th>
                    <th>datanacimento</th>
                    <th>E-mail</th>
                    <th>dep</th>
                    <th>status</th>
                    <th>ação</th>
                    <th>excluir todos? <input  type="checkbox" class="" data-toggle="modal" id="excluir" data-target="#myModal"> sim </input ></th>
                </tr>
            </thead>
            <tbody>
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
            @endif
                @foreach ($funcionario as $r)
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
                                <a href="{{route('Funcionarios.remove',['id' => $r->id ])}}" class="btn btn-segundary mr-5">Excluir</a>
                                <button type="button" class="btn btn-danger ml-5" data-dismiss="modal" onclick='fecha()'>Não</button>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td>{{$r->id}}</td>
                        <td><img src="/img/{{$r->foto}}" alt="Italian Trulli" width=50px></td>
                        <td>{{$r->nome}}</td>
                        <td>{{$r->datanacimento}}</td>
                        <td>{{$r->email}}</td>
                        <th><a  href="{{route('Funcionarios.edit',['id' => $r->id ])}}" class="btn btn-default"><img src="/img/icons/btAdd.png" alt="Italian Trulli" width=20px></a></th>
                        <td><span class="dot" id="status{{$r->id}}" onclick='trocacor({{$r->id}})'></span></td>
                        <td> 
                            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$r->id}}"> Excluir</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $funcionario->links() !!}
        </div>
  </div>
  <script>
   function trocacor(id){
    let classe = $("#status"+id).attr('class')
    if (classe == "dot") {
        $("#status"+id).removeClass('dot')
        $("#status"+id).addClass('dotgreen')
    }
    if (classe == "dotgreen") {
        $("#status"+id).removeClass('dotgreen')
        $("#status"+id).addClass('dot')
    }
    

   }
        function fecha(){
             console.log("chamous")
            $( "#excluir" ).prop( "checked", false );
        }
  </script>
@endsection

