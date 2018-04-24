@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
                 @if(Session::has('flash_message'))
                        <div class="container" align="center">
                            <div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                                        {{ Session::get('flash_message')['msg'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                 @endif
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="active">Editar</li>
                </ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}

                        </div>

                    @endif
                    <form action="{{ route('cliente.atualizar',$cliente->id) }}" method="post">
                        <div class="form-group">

                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome do cliente" value="{{$cliente->nome}}"> 
                            </div>
                            <div class="form-group">
                                <label for="nome">E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="E-mail do cliente" value="{{$cliente->email}}">                            
                            </div>

                            <div class="form-group">
                                 <label for="nome">Endereço</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente" value="{{$cliente->email}}">   
                            </div>

                        </div>
                        <button class="btn btn-info">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
