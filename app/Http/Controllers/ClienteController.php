<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	
    	//passa todos os clientes para a variável
    	$clientes = \App\Cliente::paginate(15);
    	//dd($clientes); -> exibe todos os registros

    	return view('cliente.index', compact('clientes'));

    }

    public function adicionar(){

        return view('cliente.adicionar');        
    }

    //pega os dados do formulário para salvar no banco de dados
    public function salvar(Request $request){
        \App\Cliente::create($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.adicionar');
    }

    //busca o cliente pelo id
    public function editar($id){
        $cliente = \App\Cliente::find($id);
        if(!$cliente){
        \Session::flash('flash_message', [
                'msg'=>"Não existe este cliente cadastrado! Deseja cadastrar novo cliente?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.adicionar');
        }

        return view('cliente.editar',compact('cliente'));
    }

    public function atualizar(Request $request, $id){
        \App\Cliente::find($id)->update($request->all());

            \Session::flash('flash_message', [
                    'msg'=>"Atualização sucesso!",
                    'class'=>"alert-success"
                ]);
                return redirect()->route('cliente.index');
            }

    public function deletar($id)
    {
        $cliente = \App\Cliente::find($id);

        if(!$cliente->deletarTelefones()){
            \Session::flash('flash_message',[
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.index');
        }

        $cliente->delete();

        \Session::flash('flash_message',[
            'msg'=>"Cliente deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.index'); 
    }


}
