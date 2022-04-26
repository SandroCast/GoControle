<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoMaster;

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
        $capacidade = request('capacidade');
        $bloqueio = request('bloqueio');

        $verificar = \DB::connection('mysql')->table('enderecos_masters')->where('endereco', $endereco)->first();

        if($verificar){

            return redirect('/estoque/novo')->with('msg2', 'Esse endereço já existe, tente novamente com um novo endereço.');
        }else{

            $novo = new EnderecoMaster;

            $novo->endereco = $endereco;
            $novo->descricao = $descricao;
            $novo->capacidade = $capacidade;
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

        return view('estoque.master.editar', compact('endereco'));
        
    }

    public function endereco_update($id, Request $request)
    {
        $store = EnderecoMaster::findOrFail($id);

        $endereco = request('endereco');
        $descricao = request('descricao');
        $capacidade = request('capacidade');
        $bloqueio = request('bloqueio');

        $store->endereco = $endereco;
        $store->descricao = $descricao;
        $store->capacidade = $capacidade;
        $store->bloqueio = $bloqueio;
        $store->save();
        
        return redirect('/estoque/master/enderecos')->with('msg', 'Endereço '.$endereco.' editado com sucesso.');
        
    }

    public function endereco_delete($id, Request $request)
    {
        $endereco = EnderecoMaster::findOrFail($id);

        $item = Master::where('endereco_id', $id)->get();

        if(count($item) > 0) {

            return redirect('/estoque/master/enderecos')->with('msg2', 'Endereço com itens não pode ser excluido.');
        
        }else{

            $endereco->delete();

            return redirect('/estoque/master/enderecos')->with('msg', 'Endereço excluido com sucesso.');
    
        }
    
    }

    public function buscar()
    {

        $itens = request('item');

        $url = request('item');

        if($itens) {

            $itens = Master::Where([
                ['secundario', 'like', $itens.'%']

            ])->orderBy('endereco_id', 'ASC')->get();
            
        
        }

        $saldo = Master::all();


        return view('estoque.master.buscar', compact('url','itens','saldo'));
    }

    public function retirar($id, $url, Request $request)
    {

        $qtd = request('quantidade');
        
        $item = Master::findOrFail($id);

        if($item->endereco->bloqueio == 1){
            return redirect('/estoque/master/buscar?item='.$url)->with('msg2', 'Este endereço está BLOQUEADO, desbloqueie e tente novamente.'); 
        }
        
        if($qtd > $item->quantidade){


            return redirect('/estoque/master/buscar?item='.$url)->with('msg2', 'Quantidade de retirada maior que a alocada.'); 
        }else{

            if($qtd == $item->quantidade){


                $item->delete();

                return redirect('/estoque/master/buscar?item='.$url)->with('msg', $qtd.' itens '.$item->secundario.' retirado com sucesso.'); 
            }else{


                $item->quantidade = $item->quantidade - $qtd;
                $item->qtd_caixa = $item->qtd_caixa - ceil($qtd / 12);

                $item->save();


                return redirect('/estoque/master/buscar?item='.$url)->with('msg', $qtd.' itens '.$item->secundario.' retirado com sucesso.'); 

            }
        }

    }




































    public function alocar()
    {


        $codigo = request('codigo');
        $item = request('item');
        $qtd = request('quantidade');

        $endereco = false;
        

        if($codigo) {

            $endereco = Endereco::where([
                ['id', 'like', $codigo]

            ])->get();

            if(count($endereco) < 1){
                    return redirect('/estoque/armazenamento/alocar')->with('msg2', 'Local não encontrado.');
            }
            if($endereco->first()->bloqueio == 1 ){
                    return redirect('/estoque/armazenamento/alocar')->with('msg2', 'Este local está temporariamente BLOQUEADO.');
            }
            if($endereco->first()->bloqueio == 2 ){
                    return redirect('/estoque/armazenamento/alocar')->with('msg2', 'Este local está temporariamente INATIVO.');
            }
            $limit = Master::where([
                ['endereco_id', 'like', $codigo]

            ])->get();
            if(count($limit) > 0 && ceil($qtd / 12) > $endereco->first()->capacidade - $limit->sum('qtd_caixa') ){
                return redirect('/estoque/armazenamento/alocar?codigo='.$codigo)->with('msg2', 'Quantidade ultrapassa o limite suportado.');
            }

        }

    

        if($item){

            $item = Iten::where([
                ['id', 'like', $item]

            ])->orWhere([
                ['primario', 'like', $item]

            ])->orWhere([
                ['secundario', 'like', $item]

            ])->first();


            if($item) {

            $master = Master::Where([
                ['secundarioitem', 'like', $item->secundario],
                ['endereco_id', 'like', $codigo]

            ])->get();



                if(count($master) > 0){


                    $master->first()->quantidade = $master->first()->quantidade + $qtd;
                    $master->first()->qtd_caixa = $master->first()->qtd_caixa + ceil($qtd / 12);
    
                    $master->first()->save();

                    return redirect('/estoque/armazenamento/alocar?codigo='.$codigo)->with('msg', 'Item '.$item->secundario.' alocado com sucesso.');
                }else{


                    $novo = new Master;

                    $novo->endereco_id = $codigo;
                    $novo->secundarioitem = $item->secundario;
                    $novo->tipoitem = $item->tipoitem;
                    $novo->grife = $item->grife;
                    $novo->quantidade = $qtd;
                    $novo->qtd_caixa = ceil($qtd / 12);
                    
                    $novo->save();

                    return redirect('/estoque/armazenamento/alocar?codigo='.$codigo)->with('msg', 'Item '.$item->secundario.' alocado com sucesso.');
                }

            }else{

                return redirect('/estoque/armazenamento/alocar?codigo='.$codigo)->with('msg2', 'Item não encontrado.');
                
            }

        }

        return view('master.alocar', ['endereco' => $endereco, 'codigo' => $codigo]);

    }
    
    
    
    
    
    
    
    
    
    





}
