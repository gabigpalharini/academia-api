<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteRequest $request){
        $Usuario= ClienteModel::create([
        'nome'=> $request->nome,
        'cpf'=> $request->cpf,
        'celular'=> $request->celular,
        'email'=> $request->email,
        'password'=> Hash::make($request->password)
      ]);
      return response()->json([
         "success"=> true,
         "success"=> "Usuario Cadastrado com sucesso",
         "success"=> $Usuario,
      ],200);
     }
}
