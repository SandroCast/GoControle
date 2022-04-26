@php
use App\Models\User;
@endphp

@extends('adminlte::page')

@section('title', 'GoControle')

@section('content_header')
    <h1><i class="fas fa-map-marker-alt"></i> Mapa Estoque | Alameda | Lote</h1>
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
        .dashboard-items-container th {
            width: 25%;
        }

        .dashboard-items-container form {
            display: inline-block;

        }
        .dashboard-items-container{
            background-color: white;
            padding: 1px 10px;
            margin-top: 20px;
            border-bottom: solid 1px rgb(221, 221, 221);
            border-radius: 2px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.029)

        }

            
        #forFotos {
            margin-top: 20px;
            padding: 20px 30px 30px 30px;
            background-color: white;
            border-bottom: solid 1px rgb(221, 221, 221);
            border-radius: 2px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.029);
        }
        #texPedido {
            padding: 0 20px;
            margin: 0 20px;
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }
        #pedido {
            padding: 5px 10px;
            font-size: 15px;
            color: #333;
            border: solid 1px rgb(196, 196, 196);
            min-width: 300px;
        }
        #pedido:focus {
            outline: none !important;
            border-color: #719ECE;
        }
        #btbuscar {
            font-size: 14px;
            margin: 0 30px;
            padding: 6px 12px;
            width: 100px;
            color: #444;
            border: solid 1px rgb(196, 196, 196);
        }
        #resultbusca {
            background-color: white;
            width: 100%;
            text-align: center;
            border-bottom: solid 1px rgb(221, 221, 221);
            border-radius: 2px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.029)
        }
        #textbusca {
            text-align: start;
            margin: 20px 0 0 20px;
            color: #777;
            font-size: 50px;
        }
        #imgresult {
            max-width: 100%;

        }
        #acao {
            width: 112px;
        }
        .table {
            text-align: center;

        }

        .table > thead > tr > th{
            width: 14.28%;
        }
        .col-md-3 > span {
            font-size: 40px;

        }
        #inp_retirar {
            width: 60px;

            
        }

    </style>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    @if(session('msg2'))
    <p class="msg" id="msg2">{{ session('msg2') }}</p>
    @endif


    {{------------------------------------------------- INFO -----------------------------------------------------------}}

<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>---</h3>
                <p>---</p>
            </div>

            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            {{------  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -------}}
        </div>
    </div>
    
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>---</h3>
                <p>---</p>
            </div>

            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            {{------  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -------}}
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>---</h3>
                <p>---</p>
            </div>

            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            {{------  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -------}}
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>---</h3>
                <p>---</p>
            </div>

            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            {{------  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -------}}
        </div>
    </div>



</div>

{{------------------------------------------------ INFO ------------------------------------------------------------}}


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">0 resultado(s)</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">Item</th>
                            <th>Saldo Master</th>
                            <th>Endereço</th>
                            <th>Alocada</th>
                            <th>Local Varejo</th>

                        </tr>
                    </thead>


                    <tbody>

                      {{----- @foreach ($item as $itens) -----}} 
                            <tr>
                                <td>Exemple</td>
                                <td>Exemple</td>
                                <td>Exemple</td>
                                <td>Exemple</td>
                                <td>
                                Exemple

                            </tr>
                     {{-----    @endforeach-----}} 
                    </tbody>
                </table>
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