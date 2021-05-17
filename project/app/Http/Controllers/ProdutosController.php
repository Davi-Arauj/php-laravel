<?php

namespace App\Http\Controllers;


use App\Models\produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function creat()
    {
        return view('produtos.creat');
    }

    public function index()
    {
        $produtos = produto::orderby('id','desc')->paginate();
        return view('produtos.index', ['produtos' => $produtos]);

    }

    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produtos.show', ['produto' => $produto]);

    }
    public function insert(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->estoque = $request->estoque;
        $produto->descricao = $request->descricao;
        $produto->save();
        return redirect()->route('produtos');

    }

    public function edit(produto $produto){
        return view('produtos.edit', ['produto' => $produto]);

   }

   public function editar(Request $request,produto $produto)
   {
      
       $produto->nome = $request->nome;
       $produto->valor = $request->valor;
       $produto->estoque = $request->estoque;
       $produto->descricao = $request->descricao;
       $produto->save();
       return redirect()->route('produtos');

   }

   public function delete(produto $produto)
   {
    $produto->delete();
    return redirect()->route('produtos');
   }
   public function modal(produto $produto)
   {
    $produto->delete();
    return redirect()->route('produtos');
   }