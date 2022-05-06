<h3 id="linhas">{{count($itens)}}<h3>

<table width="100%" border="1" cellpadding="5" cellspacing="2"> 
    <tr>
        <td align="center">Item</td>
        <td align="center">Grife</td>
        <td align="center">Endereço</td>
        <td align="center">Qtde</td>
    </tr>


    @foreach ($itens as $item)
        <tr>
            <td align="center" class="item">{{$item->secundario}}</td>
            <td align="center" class="grife">{{$item->grife}}</td>
            <td align="center" class="endereco">{{$item->endereco_nome}}</td>
            <td align="center" class="qtd">{{$item->quantidade}}</td>
        </tr>

    @endforeach

    

     
</table>