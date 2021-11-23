<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::with('categoria')->paginate(25);
        Paginator::useBootstrap();
        return view('admin.noticias.lista', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::select('nome', 'id')->orderBy('ordem', 'DESC')->pluck('nome', 'id');
        return view('admin.noticias.formulario', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/fotos');
        if (!File::exists($pasta)){
            echo "ainda nao tem a pasta";
            File::makeDirectory($pasta, $mode=0777, true);
        }
        if ($request->hasFile('foto')){
            $foto = $request->file('foto');
            $miniatura =  Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            if (!$miniatura->resize(500,500, function($constraint){
                                              $constraint->aspectRatio();
                                             })
                 ->save($pasta. '/'.$nomeArquivo)
            ){
                $nomeArquivo = 'semfoto.jpg';
            }
        } else {
            $nomeArquivo = 'semfoto.jpg';
        }
        $noticia = new Noticia();
        $noticia = $noticia->fill($request->all());
        $noticia->foto = $nomeArquivo;
        $noticia->user_id = Auth::user()->id;
        $noticia->save();
        $request->session()->flash('mensagem_sucesso', 'Noticia cadastrada com sucesso!');
        return Redirect::to('noticias/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        $noticia = Noticia::find($noticia->id);
        $categorias = Categoria::select('nome', 'id')->orderBy('ordem', 'DESC')->pluck('nome', 'id');
        return view('admin.noticias.formulario', compact('categorias', 'noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $noticia = Noticia::find($noticia->id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/fotos');
        if (!File::exists($pasta)){
            echo "ainda nao tem a pasta";
            File::makeDirectory($pasta, $mode=0777, true);
        }
        if ($request->hasFile('foto')){
            $foto = $request->file('foto');
            $miniatura =  Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            if (!$miniatura->resize(500,500, function($constraint){
                                              $constraint->aspectRatio();
                                             })
                 ->save($pasta. '/'.$nomeArquivo)
            ){
                $nomeArquivo = 'semfoto.jpg';
            }
        } else {
            $nomeArquivo = $noticia->foto;
        }
        $noticia = $noticia->fill($request->all());
        if(!$request->filled('manchete')){
            $noticia->manchete = 'N';
        }
        $noticia->foto = $nomeArquivo;
        $noticia->user_id = Auth::user()->id;
        $noticia->save();
        $request->session()->flash('mensagem_sucesso', 'Noticia cadastrada com sucesso!');
        return Redirect::to('noticias/'.$noticia->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Noticia $noticia)
    {
        $noticia = Noticia::find($noticia->id);
        $ok = true;
        if (!empty($noticia->foto)){
            if ($noticia->foto == 'semfoto.jpg'){
                $ok = true;
            } else if (file_exists(public_path('uploads/fotos/').$noticia->foto)){
                $ok = unlink(public_path('uploads/fotos/').$noticia->foto);
            }
        }
        if ($ok){
            $noticia->delete();
            $request->session()->flash('mensagem_sucesso', 'Noticia removida com sucesso!');
            return Redirect::to('noticias');
        }
    }
}
