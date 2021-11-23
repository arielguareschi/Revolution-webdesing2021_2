<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContatoController extends Controller
{
    public function index(){
        return view('contato');
    }

    public function enviar(Request $request){
        $dest_nome = "Ariel";
        $dest_email = "ariel@unisep.edu.br";
        $dados = array( 'nome' => $request['nome'],
                        'email' => $request['email'],
                        'fone' => $request['fone'],
                        'mensagem' => $request['mensagem']);
        Mail::send('emails.contato', $dados,
            function($mensagem) use ($dest_nome, $dest_email, $request){
                $mensagem->to($dest_email, $dest_nome)
                         ->subject('E-mail do site!')
                         ->bcc(['arielguareschi@gmail.com', 'ariel@aerosystem.com.br'])
                         ->replyTo($request['email'], $request['nome']);
                $mensagem->from($request['email'], $request['nome']);
            }
        );
        $request->session()->flash('mensagem_sucesso', 'E-mail enviado com sucesso!');
        return Redirect::to('contato');
    }
}
