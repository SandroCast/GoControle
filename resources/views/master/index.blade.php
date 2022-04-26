@extends('layouts.principal')

@section('title')
<i class="fa fa-map"></i> Mapa Estoque Piso 1
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
        .opc {
            float: right;
            background-color: white;
            margin: 0px 5px;
            padding: 0px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #444;
        }
        .container {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto auto;
            gap: 2px;

        }

        .rack {
            text-align: center;
            display: grid;
            grid-template-columns: auto auto auto auto; 

        }
        .rack > a{
            text-decoration: none;
            font-weight: bold;

        }
        .rua {
            text-align: center;
        }

        .bloco {
            background-color: green;
            color: white;
        }
        .blocoL {
            background-color: Orange;
            color: white;
        }
        .blocoV {
            background-color: red;
            color: white;
        }
        .blocoB {
            background-color: yellow;
            color: black;
        }
        .blocoI {
            background-color: white;
            color: black;
        }
        .hove:hover {
            background-color: dodgerblue;
            color: white;
        }

        .detalhes{
            font-size: 30px;

        }
        .r1 {
            grid-row-start: 1;
        }
        .r2 {
            grid-row-start: 2;
        }
        .r3 {
            grid-row-start: 3;
        }
        .r4 {
            grid-row-start: 4;
        }
        .r5 {
            grid-row-start: 5;
        }
        .r6 {
            grid-row-start: 6;
        }
        .r7 {
            grid-row-start: 7;
        }
        .r8 {
            grid-row-start: 8;
        }
        .r9 {
            grid-row-start: 9;
        }
        .r10 {
            grid-row-start: 10;
        }
        .r11 {
            grid-row-start: 11;
        }
        .r12 {
            grid-row-start: 12;
        }
        .r13 {
            grid-row-start: 13;
        }
        .r14 {
            grid-row-start: 14;
        }
        .r15 {
            grid-row-start: 15;
        }
        .r16 {
            grid-row-start: 16;
        }
        .r17 {
            grid-row-start: 17;
        }
        .r18 {
            grid-row-start: 18;
        }
        .r19 {
            grid-row-start: 19;
        }

        .f1 {
            grid-column-start: 1;
        }
        .f2 {
            grid-column-start: 2;
        }
        .f3 {
            grid-column-start: 3;
        }
        .f4 {
            grid-column-start: 4;
        }
        .f5 {
            grid-column-start: 5;
        }
        .f6 {
            grid-column-start: 6;
        }
        .f7 {
            grid-column-start: 7;
        }
        .f8 {
            grid-column-start: 8;
            
        }
        .f9 {
            grid-column-start: 9;
        }
        .f10 {
            grid-column-start: 10;
            
        }
        
    </style>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    @if(session('msg2'))
    <p class="msg" id="msg2">{{ session('msg2') }}</p>
    @endif

{{------------------------------------------------- INFO -----------------------------------------------------------}}

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-braille"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">LOCAIS DISPONÍVEIS</span>
        <br>
        <span class="info-box-number">{{ $endereco->sum('capacidade') - $master->sum('qtd_caixa')}} caixinha(s)</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-purple"><i class="fa fa-cubes"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">CAIXINHAS ALOCADAS</span>
        <br>
        <span class="info-box-number">{{ $master->sum('qtd_caixa') }} caixinha(s)</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">PEÇAS ALOCADAS</span>
        <br>
        <span class="info-box-number">{{ $master->sum('quantidade') }} peça(s)</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-ellipsis-h"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">---</span>
        <br>
        <span class="info-box-number">---</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

{{------------------------------------------------ INFO ------------------------------------------------------------}}

<div class="container">


 {{------------------------------------------------ FILA 01 ----------------------------------------------------}}
<div class="f1">
    @php $row = 1; $rua = 2; @endphp

    @while ($row < 9)    

        @php $contador = 1; $lote_inicio1 = 9; $lote_inicio2 = 8; @endphp
        
        <h5 class="rua">
            Rua {{$rua}}
        </h5>
        <div class="rack">

            @while ($contador < 9)
                @if($contador == 5)
                    @php $rua ++; @endphp
                @endif
                @if($contador > 4)
                    @php $lote = $lote_inicio2; @endphp
                @else
                    @php $lote = $lote_inicio1; @endphp
                @endif
                    @php $descricao = 'P1R' .$rua.'L'.$lote; @endphp
                @if($endereco->where('descricao', $descricao)->first()->bloqueio == 2)
                <a class="blocoI hove" href="/estoque/armazenamento/master/{{$descricao}}">INA</a>
                @elseif($endereco->where('descricao', $descricao)->first()->bloqueio == 1)
                <a class="blocoB hove" href="/estoque/armazenamento/master/{{$descricao}}">BLO</a>
                @elseif($master->where('endereco_id', $endereco->where('descricao', $descricao)->first()->id)->sum('qtd_caixa') >= $endereco->where('descricao', $descricao)->first()->capacidade)
                <a class="blocoV hove" href="/estoque/armazenamento/master/{{$descricao}}">Lo{{$lote}}</a>
                @elseif($master->where('endereco_id', $endereco->where('descricao', $descricao)->first()->id)->sum('qtd_caixa') > $endereco->where('descricao', $descricao)->first()->capacidade / 2)
                <a class="blocoL hove" href="/estoque/armazenamento/master/{{$descricao}}">Lo{{$lote}}</a>
                @else
                <a class="bloco hove" href="/estoque/armazenamento/master/{{$descricao}}">Lo{{$lote}}</a>
                @endif
                @if($contador > 4)
                    @php $lote_inicio2 --; @endphp
                @else
                    @php $lote_inicio1 ++; @endphp
                @endif
                    @php $contador ++; @endphp
            @endwhile
        </div>
        @php $row ++; @endphp
    @endwhile
    <h5 class="rua">
        Rua {{$rua}}
    </h5>
</div>
{{------------------------------------------------ FILA 01 ----------------------------------------------------}}









</div>




@stop
