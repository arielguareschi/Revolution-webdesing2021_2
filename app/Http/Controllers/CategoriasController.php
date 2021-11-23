<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('ordem', 'desc')->paginate(25);
        Paginator::useBootstrap();
        return view('admin.categorias.lista', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->fill($request->all());
        $categoria->save();
        $request->session()->flash('mensagem_sucesso', 'Categoria salva com sucesso!');
        return Redirect::to('categorias/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id);
        return view('admin.categorias.formulario', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id);
        $categoria->fill($request->all());
        if(!$request->filled('destaque')){
            $categoria->destaque = 'N';
        }
        $categoria->save();
        $request->session()->flash('mensagem_sucesso', 'Categoria alterada com sucesso!');
        return Redirect::to('categorias/'.$categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id);
        if ($categoria->delete()){
            $request->session()->flash('mensagem_sucesso', 'Categoria removida com sucesso');
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao excluir a categoria!');
        }
        return Redirect::to('categorias');
    }
}
