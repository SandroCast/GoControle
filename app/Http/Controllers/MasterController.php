<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoMaster;
use App\Models\Master;
use App\Models\Iten;
use App\Models\Kardex;

class MasterController extends Controller
{
    

    public function endereco_novo()
    {
        return view('master.novo');
    
    }


    public function endereco_criar(Request $request)
    {
        $endereco = request('endereco');
        $descricao = request('descricao');
        $bloqueio = request('bloqueio');

        $verificar = \DB::connection('mysql')->table('enderecos_masters')->where('endereco', $endereco)->first();

        if($verificar){

            return redirect('/estoque/novo')->with('msg2', 'Esse endereço já existe, tente novamente com um novo endereço.');
        }else{

            $novo = new EnderecoMaster;

            $novo->endereco = $endereco;
            $novo->descricao = $descricao;
            $novo->bloqueio = $bloqueio;
    
            $novo->save();
    
            return redirect('/estoque/novo')->with('msg', 'Endereço criado com sucesso.');


        }
        
        
    }


    public function enderecos_lista(Request $request)
    {

        $busca = request('search');

        if($busca) {

            $enderecos = EnderecoMaster::where([
                ['endereco', 'LIKE', '%'.$busca.'%']

            ])->orwhere([
                ['descricao', 'LIKE', '%'.$busca.'%']
                
            ])->orderBy('id', 'DESC')->get();

            return view('master.enderecos', compact('enderecos'));
        }else{

            $enderecos = EnderecoMaster::where('id', '>', 0)->orderBy('id', 'DESC')->get();
            return view('master.enderecos', compact('enderecos'));
        }

    }

    public function endereco_editar($id, Request $request)
    {

        $endereco = EnderecoMaster::findOrFail($id);

        return view('master.editar', compact('endereco'));
        
    }

    public function endereco_update($id, Request $request)
    {
        $store = EnderecoMaster::findOrFail($id);

        $endereco = request('endereco');
        $descricao = request('descricao');
        $bloqueio = request('bloqueio');

        $store->endereco = $endereco;
        $store->descricao = $descricao;
        $store->bloqueio = $bloqueio;
        $store->save();
        
        return redirect('/estoque/enderecos')->with('msg', 'Endereço '.$endereco.' editado com sucesso.');
        
    }

    public function endereco_delete($id, Request $request)
    {
        $endereco = EnderecoMaster::findOrFail($id);


        $item = Master::where('endereco_id', $id)->get();

        if(count($item) > 0) {

            return redirect('/estoque/enderecos')->with('msg2', 'Endereço com itens não pode ser excluido.');
        
        }else{

            $endereco->delete();

            return redirect('/estoque/enderecos')->with('msg', 'Endereço excluido com sucesso.');
    
        }
    
    }

    public function buscar(Request $request)
    {

        $itens = request('item');

        $url = request('item');

        if($itens) {

            $itens = Master::Where([
                ['secundario', 'like', $itens.'%']

            ])->orderBy('endereco_id', 'ASC')->get();
            
        
        }

        $saldo = Master::all();

        return view('master.buscar', compact('url','itens','saldo'));
    }


    public function retirar($url, $id,  Request $request)
    {
        $user = auth()->user();

        $qtd = request('quantidade');
        
        $item = Master::findOrFail($id);

        if($item->endereco->bloqueio == 1){
            return redirect('/estoque/buscar?item='.$url)->with('msg2', 'Este endereço está BLOQUEADO, desbloqueie e tente novamente.'); 
        }
        
        if($qtd > $item->quantidade){


            return redirect('/estoque/buscar?item='.$url)->with('msg2', 'Quantidade de retirada maior que a alocada.'); 
        }else{

            if($qtd == $item->quantidade){

                $kardex = new Kardex;
                $kardex->item = $item->secundario;
                $kardex->usuario = $user->name;
                $kardex->movimentacao = 'S';
                $kardex->local = $item->endereco_nome;
                $kardex->qtde = "-".$qtd;
                $kardex->save();

                $item->delete();

                return redirect('/estoque/buscar?item='.$url)->with('msg', $qtd.' itens '.$item->secundario.' retirado com sucesso.'); 
            }else{

                $kardex = new Kardex;
                $kardex->item = $item->secundario;
                $kardex->usuario = $user->name;
                $kardex->movimentacao = 'S';
                $kardex->local = $item->endereco_nome;
                $kardex->qtde = "-".$qtd;
                $kardex->save();

                $item->quantidade = $item->quantidade - $qtd;
                $item->save();

                return redirect('/estoque/buscar?item='.$url)->with('msg', $qtd.' itens '.$item->secundario.' retirado com sucesso.'); 

            }
        }

    }

    public function alocar()
    {
        $user = auth()->user();

        $codigo = request('codigo');
        $item = request('item');
        $qtd = request('quantidade');

        $endereco = false;
        

        if($codigo) {

            $endereco = EnderecoMaster::where([
                ['id', $codigo]
            ])->orWhere([
                ['endereco','LIKE', $codigo]
            ])->get();

            if(count($endereco) < 1){
                    return redirect('/estoque/alocar')->with('msg2', 'Local não encontrado.');
            }
            if($endereco->first()->bloqueio == 1 ){
                    return redirect('/estoque/alocar')->with('msg2', 'Este local está temporariamente BLOQUEADO.');
            }
            if($endereco->first()->bloqueio == 2 ){
                    return redirect('/estoque/alocar')->with('msg2', 'Este local está temporariamente INATIVO.');
            }

        }



        if($item){

            $item = Iten::where([
                ['curto', $item]

            ])->orWhere([
                ['primario', $item]

            ])->orWhere([
                ['secundario', $item]

            ])->first();


            if($item) {

            $master = Master::Where([
                ['secundario', $item->secundario],
                ['endereco_id', $endereco->first()->id]

            ])->get();


                if(count($master) > 0){

                    $kardex = new Kardex;
                    $kardex->item = $item->secundario;
                    $kardex->usuario = $user->name;
                    $kardex->movimentacao = 'E';
                    $kardex->local = $endereco->first()->endereco;
                    $kardex->qtde = $qtd;
                    $kardex->save();

                    $master->first()->quantidade = $master->first()->quantidade + $qtd;
    
                    $master->first()->save();

                    return redirect('/estoque/alocar?codigo='.$codigo)->with('msg', 'Item '.$item->secundario.' alocado com sucesso.');
                }else{

                    $kardex = new Kardex;
                    $kardex->item = $item->secundario;
                    $kardex->usuario = $user->name;
                    $kardex->movimentacao = 'E';
                    $kardex->local = $endereco->first()->endereco;
                    $kardex->qtde = $qtd;
                    $kardex->save();

                    $novo = new Master;
                    $novo->item_id = $item->curto;
                    $novo->primario = $item->primario;
                    $novo->secundario = $item->secundario;
                    $novo->tipoitem = $item->tipo;
                    $novo->grife = $item->grife;
                    $novo->endereco_id = $endereco->first()->id;
                    $novo->endereco_nome = $endereco->first()->endereco;
                    $novo->quantidade = $qtd;

                    $novo->save();


                    return redirect('/estoque/alocar?codigo='.$codigo)->with('msg', 'Item '.$item->secundario.' alocado com sucesso.');
                }

            }else{

                return redirect('/estoque/alocar?codigo='.$codigo)->with('msg2', 'Item não encontrado.');
                
            }

        }

        return view('master.alocar', ['endereco' => $endereco, 'codigo' => $codigo]);

    }
    

    public function movimentacoes(Request $request)
    {

        $itens = request('busca');

        if($itens) {

            $itens = \DB::connection('mysql')->table('kardex_masters')
            ->where('item', $itens)
            ->orWhere('usuario', 'like', $itens. '%')
            ->orWhere('movimentacao', $itens)
            ->orWhere('local', $itens)
            ->orderBy('created_at', 'DESC')
            ->get();
        }

        return view('master.movimentacoes', compact('itens'));  
    }

    public function estoque_lista(Request $request)
    {

        $item = request('item');
        $endereco = request('endereco');
        $grife = request('grife');

    
        $masters = Master::where([
            ['id', '>', 0],
            ['secundario', $item],
            ['endereco_nome', $endereco],
            ['grife', $grife]
        ])->get();


        return view('master.lista', compact('masters');

    }
    
    
    
    
    
    
    
    
    





}
