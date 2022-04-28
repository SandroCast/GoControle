<body>
    <h3>ESTOQUE MASTER </h3>
    <span id="linhas">{{count($masters)}}</span> Resultado(s)
    
    <h3>

        <table width="100%" border="1" cellpadding="5" cellspacing="2"> 
            <tbody>
                
                <tr>
                    <td>Item</td>
                    <td>Quantidade</td>
                    <td>Endereço</td>
                    <td>Grife</td>
                    <td>Local</td>
                </tr>

                @if($masters)

                    @foreach ($masters as $master)

                        <tr>
                            <td class="item">{{$master->secundario}}</td>
                            <td class="quantidade">{{$master->quantidade}}</td>
                            <td class="endereco">{{$master->endereco_nome}}</td>
                            <td class="grife">{{$master->grife}}</td>
                            <td class="local">{{$master->local_prateleira->local_prateleira}}</td>
                        </tr>
                        
                    @endforeach
                
                @endif
            
            </tbody>

        </table>

    </h3>

</body>