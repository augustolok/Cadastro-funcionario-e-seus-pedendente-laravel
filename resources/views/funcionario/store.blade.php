@extends('layouts.app')

@section('content')  
  <div class="container">
  @if ($mensagem == 13)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Pessoa com 120 Anos ou mais, não pode ser cadastrado!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
 
    @if ($mensagem == 12)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> foto vazia!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif  
     @if ($mensagem == 11)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> foto deve ter no maximo 200 kb!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    @if(session()->has('message'))
         @if (session()->get('message') == 11)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> foto deve ter no maximo 200 kb!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            @endif
@endif
      <form action="{{route('Funcionarios.store')}}" method="post" class=""  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
            <lable id="">Nome:</lable>
                <input type="text" name="nome" id="nome" value="{{old('nome')}}" class="form-control">
                <br>
                @if ($errors->has('nome'))
                {{$errors->first('nome')}}
                @endif
            </div>
            <div class="form-group">
                <lable id="">datanacimento:</lable>
                <input type="date" name="datanacimento" id="datanacimento" value="{{old('datanacimento')}}" class="form-control">
                
                <br>
                @if ($errors->has('datanacimento'))
                {{$errors->first('datanacimento')}}
                @endif
            </div>
            <div class="form-group">
                <lable id="">E-mail:</lable>
                <input type="email" name="email" id="datanacimento" value="{{old('email')}}" class="form-control">
                
                <br>
                @if ($errors->has('email'))
                {{$errors->first('email')}}
                @endif
            </div>
            
            <div class="form-group">
                <lable id="">foto:</lable>
                <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1" >
                <br>
                @if ($errors->has('datanacimento'))
                {{$errors->first('datanacimento')}}
                @endif
            </div>
            <div class="form-group"> 
                <input type="submit" value="enviar" class="btn btn-primary">
            </div>
        </form>
  </div>
  @endsection
  