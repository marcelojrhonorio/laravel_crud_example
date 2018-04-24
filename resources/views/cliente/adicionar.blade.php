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
                    <li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}

                        </div>

                    @endif
                    <form action="{{ route('cliente.salvar') }}" method="post">
                        <div class="form-group">

                            {{ csrf_field() }}

                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do cliente">

                            <label for="nome">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="E-mail do cliente">

                            <label for="nome">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente">
                        </div>
                        <button class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
