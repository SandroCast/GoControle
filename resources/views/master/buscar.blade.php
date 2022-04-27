@extends('adminlte::page')

@section('title', 'GoControle')

@section('content_header')
    <h1><i class="fa fa-search"></i> Buscar Itens no Estoque</h1>
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
        <div class="row">
            <form action="" method="GET">
                <input type="text" name="item" placeholder="Digite o Item para Buscar"  autofocus="autofocus" value="" class="form-control">
                <button class="btn btn-default btn-flat">Buscar</button>
            </form>
        </div>    
    </div>


    @if($itens)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ count($itens) }} resultado(s)</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Saldo Master</th>
                            <th>Endereço</th>
                            <th>Alocada</th>
                            <th>Ação</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($itens as $item)
                            <tr>
                                <td>{{ $item->secundario }}</td>
                                <td>{{ $saldo->where('secundario', $item->secundario)->sum('quantidade') }}</td>
                                <td>{{ $item->endereco->endereco }}</td>
                                <td>{{ $item->quantidade }}</td>
                                <td>
                                    <form action="/estoque/retirar/{{$url}}/{{$item->id}}"  method="POST">
                                        @method('POST')
                                        @csrf
                                        <input type="text" name="quantidade" required>
                                        <input style="margin-left:15px;" class="btn btn-danger btn-sm" type="submit" value="Retirar">
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    @endif





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