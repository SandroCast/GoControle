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

        <div class="card card-primary" style="max-width:50%;">
            <div class="card-body">
                <form action="#" method="POST">
                    @method('POST')
                    @csrf

                    <div class="form-control">
                        <label for="Nome">Código</label>     
                        <input type="password" name="codigo" id="senha" placeholder="Digite o Código" required>

                        <i id="olhoa" onclick="show()" class="far fa-eye"></i>
                        <i id="olhof" onclick="show()" class="far fa-eye-slash"  style="display: none;"></i>

                    </div>
                    
                    <br><br>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>

        </div>

    </center>




    <script>                        
        function show() {
            var senha = document.getElementById("senha");
            var olhoA = document.getElementById("olhoa");
            var olhoF = document.getElementById("olhof");
            if (senha.type === "password") {
                senha.type = "text";
                olhoA.style.display = 'none';
                olhoF.style.display = 'inline';
            } else {
                senha.type = "password";
                olhoF.style.display = 'none';
                olhoA.style.display = 'inline';
            }
        }
    </script>

    <!----------------->

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