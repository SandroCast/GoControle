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


    </style>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    @if(session('msg2'))
    <p class="msg" id="msg2">{{ session('msg2') }}</p>
    @endif


<!----------------->

    <center>

        <script>                        
            function show() {
                var senha = document.getElementById("senha");
                if (senha.type === "password") {
                    senha.type = "text";
                } else {
                    senha.type = "password";
                }
            }
        </script>
        
        <input type="password" name="senha" id="senha" placeholder="Digite a Senha" required>

        <i onclick="show()" class="far fa-eye"></i>
        
        
        <br><br>
        <input type="submit" value="Enviar">
        
    </center>

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