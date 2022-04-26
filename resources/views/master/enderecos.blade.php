@extends('adminlte::page')

@section('title', 'GoControle')

@section('content_header')
    <h1><i class="fas fa-map-marker"></i> Endereços</h1>
@stop

@section('content')

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



    <div class="card card-widget card-body">
        <div class="">
            <form action="/estoque/enderecos">
                <input style="width: 50%; margin: 10px; display: inline;" type="text" name="search" autofocus="autofocus" class="form-control">
                <button style="display: inline;" class="btn btn-default btn-flat"><i class="fas fa-search"></i> Pesquisar</button>
            </form>
            <div class="pull-right" style="float: right;">
                <a href="/estoque/novo" class="btn btn-default btn-flat pull-right"><i class="fas fa-plus"></i> Novo</a>
            </div>
        </div>    

        <br>
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-12">

                    <table class="table table-bordered table-striped tabela3 dataTable no-footer table-hover" id="myTable" role="grid" aria-describedby="myTable_info">
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
                                            <a href="/estoque/endereco/editar/{{ $endereco->id }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
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

@section('footer')      
    <strong>Copyright © 2014-2022 <a href="https://goeyewear.com.br/">GO Eyewear</a>.</strong>
    Todos direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop