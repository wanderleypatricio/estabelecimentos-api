<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estabelecimento;
class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //faz a consulta de todos os estabelecimentos nos banco de dados
        $estabelecimentos = Estabelecimento::all();
        return response()->json($estabelecimentos);
    }

    public function busca(Request $request)
    {
        $busca = $request->only('busca');
        //faz a consulta de todos os estabelecimentos nos banco de dados
        $estabelecimentos = Estabelecimento::where('cidade', 'like', $busca)->get();
        return response()->json($estabelecimentos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pega os dados da requisição
        $dados = $request->all();
        //faz a criação de um novo registro 
        $estabelecimento = Estabelecimento::create($dados);
        //verifica se os dados foram cadastrados com sucesso
        if($estabelecimento){
            return response()->json(['data'=>$estabelecimento, 'status'=>true]);
        } else{
            return response()->json(['data'=>'Erro ao tentar cadastrar novo estabelecimento', 'status'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //consulta pelo estabelecimento de acorodo co o seu id
        $estabelecimento = Estabelecimento::find($id);
        //se o estabelecimento for encontrado retorn os dados do estabelecimento caso não seja retorn mensagem de erro
        if($estabelecimento){
            return response()->json($estabelecimento);
        } else{
            return response()->json(['data'=>'Esse estabelecimento não foi encontrado', 'status'=>false]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $estabelecimento = Estabelecimento::find($id);
        if($estabelecimento){
            $estabelecimento->update($dados);
            return response()->json(['data'=>$estabelecimento, 'status'=>true]);
        } else{
            return response()->json(['data'=>'Erro ao tentar alterar registro', 'status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if($estabelecimento){
            $estabelecimento->delete();
            return response()->json(['data'=>'Estabelecimento excluído com sucesso','status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao excluir registro','status'=>false]);
        }
    }
}
