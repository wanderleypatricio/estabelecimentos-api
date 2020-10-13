<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::create($request->all())){
            return response()->json(['msg'=> 'Cadastro realizado com sucesso!'], 200);
        }else{
            return response()->json(['Error'=> 'Algum problema ocorreu ao tentar cadastrar item'], 400);
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
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'msg'   => 'Esse produto não existe',
            ], 404);
        }

        return response()->json($user);
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
        $user = User::find($id);
        if($user){
            if($user->update($request->all())){
                return response()->json(['msg'=>'Registro alterado com sucesso!'], 200);
            }else{
                return response()->json(['Error'=>'Problema na tentativa de altrar registro'], 400);
            }
        }else{
            return response()->json(['Error'=>'Usuário não existe na base de dados'], 400);
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
        $user = User::find($id);
        if($user){
            if($user->delete()){
                return response()->json(['msg'=>'Registro excluído com sucesso!'], 200);
            }else{
                return response()->json(['Error'=>'Problema na tentativa de excluir registro'], 400);
            }
        }else{
            return response()->json(['Error'=>'Usuário não existe na base de dados'], 400);
        }
    }

    public function retornaListaPedidosID($id){
        $user = User::find($id);
        if($user){
            $pedido = $user->pedido()->get();
            return response()->json($pedido);
        }else{
            return response()->json(['Error'=>'Cliente não existe na base de dados'], 400);
        }
    }
}
