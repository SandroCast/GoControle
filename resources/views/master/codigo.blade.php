@extends('adminlte::page')

@section('title', 'GoControle')

@section('content_header')
    <h1><i class="fas fa-key"></i> Meu Código</h1>
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







        #myPassword {
        width: 150px;
        padding-right: 20px;
        }
        
        .olho {
            cursor: pointer;
            left: 160px;
            position: absolute;
            width: 20px;
        }
        

    </style>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    @if(session('msg2'))
    <p class="msg" id="msg2">{{ session('msg2') }}</p>
    @endif


<!----------------->
        <script>
            function mouseoverPass(obj) {
                var obj = document.getElementById('myPassword');
                obj.type = "text";
            }
            function mouseoutPass(obj) {
                var obj = document.getElementById('myPassword');
                obj.type = "password";
            }

        </script>
            

    <br>
  
  <input type="password" name="password" id="myPassword" size="30" />

  <i class="fas fa-key"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII=" onclick="mouseoverPass();" onmouseout="mouseoutPass();"  id="olho" class="olho"/>
  
  </i>
 









    <!----------------->


    <div class="card card-primary" style="max-width:50%;">
        <div class="card-body">
            <form action="/estoque/novo/criar" method="POST">
                @method('POST')
                @csrf

                <label for="Nome">Endereço</label>
                <input name="endereco" class="form-control form-control" type="text" placeholder="Digite o Endereço" required>
                <br>
                <label for="Nome">Descrição Breve</label>
                <input name="descricao" class="form-control form-control" type="text" placeholder="Digita algo a mais sobre o endereço" required>
                <br>
                <label for="Nome">Status</label>
                <select class="form-control" name="bloqueio">
                    <option value="0" selected="">Desbloqueado</option>
                    <option value="1">Inativo</option>
                    <option value="2">Bloqueado</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
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