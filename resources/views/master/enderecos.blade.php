@extends('layouts.principal')

@section('title')
<i class="fa fa-map-marker"></i> Endereços
@append 

@section('conteudo')

    <style>
        .msg {
                background-color: #D4EDDA;
                color: #155724;
                border: 1px solid #C3E6CB;
                width: 100%;
                margin-bottom: 15px;
                text-align: center;
                padding: 10px;
        }
        #msg2 {
            background-color: #edd4d4;
            color: #ff0000;
            border: 1px solid #ffebeb;
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
        }
    </style>

@if(session('msg'))
<p class="msg">{{ session('msg') }}</p>
@endif
@if(session('msg2'))
<p class="msg" id="msg2">{{ session('msg2') }}</p>
@endif



    <div class="box box-widget box-body">
        <div class="row">
            <form action="/estoque/master/enderecos">
                <div class="col-md-6">
                    <input type="text" name="search" autofocus="autofocus" class="form-control">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-default btn-flat"><i class="fa fa-search"></i> Pesquisar</button>
                </div>
            </form>
            <div class="col-md-2 pull-right">
                <a href="/estoque/master/novo" class="btn btn-default btn-flat pull-right"><i class="fa fa-plus"></i> Novo</a>
            </div>
        </div>    

        <br>
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-12">

                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Endereço</th>
                                <th>Descrição</th>
                                <th>Capacidade</th>
                                <th>Ação</th>
                            </tr>                
                        </thead>

                        <tbody>

                            @if($enderecos)

                                @foreach($enderecos as $endereco)
                                    <tr>
                                        <td>{{$endereco->id}}</td>
                                        <td>{{$endereco->endereco}}</td>
                                        <td>{{$endereco->descricao}}</td>
                                        <td>{{$endereco->capacidade}}</td>
                                        <td>
                                            <a href="/estoque/master/endereco/editar/{{ $endereco->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                        </td>
    
                                    </tr>
                        
                                @endforeach
    
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

        </div>    
    </div>



@stop