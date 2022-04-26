@extends('layouts.principal')

@section('title')
<i class="fa fa-search"></i> Buscar Itens no Estoque
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
            <form action="" method="GET">
                <div class="col-md-6">
                    <input type="text" name="item" placeholder="Digite o Item para Buscar"  autofocus="autofocus" value="" class="form-control">
                </div>
                
                <div class="col-md-2">
                    <button class="btn btn-default btn-flat">Buscar</button>
                </div>
                <div class="col-md-4">
                </div>
            </form>
        </div>    
    </div>


    @if($itens)
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ count($itens) }} resultado(s)</h3>
            </div>

            <div class="box-body p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Saldo Master</th>
                            <th>Endereço</th>
                            <th>Alocada</th>
                            <th>Local Varejo</th>
                            <th>Saldo Existente</th>
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
                                <td>{{$item->local->local_prateleira}}</td>
                                <td>{{$item->saldo->existente + $item->saldo->saldo_trocas}}</td>
                                <td>
                                    <form action="/estoque/master/item/retirar/{{$url}}/{{$item->id}}">
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

