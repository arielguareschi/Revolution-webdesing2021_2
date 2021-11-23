<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Noticiafoto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class NoticiafotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $noticia = Noticia::find($id)->first();
        $fotos = Noticiafoto::where('noticia_id', '=', $id)->paginate(25);
        Paginator::useBootstrap();
        return view('admin.noticiafotos.lista', compact('fotos', 'noticia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticiaFoto  $noticiaFoto
     * @return \Illuminate\Http\Response
     */
    public function show($id, NoticiaFoto $noticiaFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticiaFoto  $noticiaFoto
     * @return \Illuminate\Http\Response
     */
    public function edit($id, NoticiaFoto $noticiaFoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticiaFoto  $noticiaFoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,  NoticiaFoto $noticiaFoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticiaFoto  $noticiaFoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, NoticiaFoto $noticiaFoto)
    {
        //
    }
}
