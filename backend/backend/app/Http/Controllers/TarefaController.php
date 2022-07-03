<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;



class TarefaController extends Controller
{

    public function listar(Request $request)
    {
        $List = Tarefa::all();


        return response()->json( $List);
    }

    public function create(Request $request){


        if($request->nome == 'undefined'){
            $msg = [
                'msg'=>'Nome não pode ser vazio',
                'status'=> false
            ];

            return response()->json( $msg);
        };

        if($request->descricao == 'undefined'){
            $msg = [
                'msg'=>'Descricao não pode ser vazio',
                'status'=> false
            ];

            return response()->json( $msg);
        };

        if($request->status == 'undefined'){
            $request->status = 'C';
        };
        $tarefa = new Tarefa();
        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;
        $tarefa->status = $request->status  ;

        $tarefa->save();

        $msg = [
            'msg'=>'Registro cadastrado com sucesso',
            'status'=> true
        ];
        return response()->json( $msg);

    }

    public function edit($id){

        $tarefa = Tarefa::where('id',$id) ->get();


        return response()->json( $tarefa);
    }


    public function update(Request $request){

        
        if($request->nome == 'undefined'){
            $msg = [
                'msg'=>'Nome não pode ser vazio',
                'status'=> false
            ];

            return response()->json( $msg);
        };

        if($request->descricao == 'undefined'){
            $msg = [
                'msg'=>'Descricao não pode ser vazio',
                'status'=> false
            ];

            return response()->json( $msg);
        };

        if($request->status == 'undefined'){
            $request->status = 'C';
        };

        $tarefa = Tarefa::where('id',$request->id) ->first();
        $tarefa->nome       = $request->nome;
        $tarefa->descricao  = $request->descricao;
        $tarefa->status     = $request->status;


        if($tarefa->save()){
            return response()->json([
                'status'=> true,
                'msg'=> 'Atualizado com sucesso'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'msg'=> 'Erro ao atualizar'
            ]);
        }

    }


    public function delete($id)
    {

        $tarefa = Tarefa::find($id);

        if($tarefa->delete()){
            return response()->json([
                'status'=> true,
                'msg'=> 'Excluido comm sucesso'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'msg'=> 'Erro ao excluir'
            ]);
        }

    }
}
