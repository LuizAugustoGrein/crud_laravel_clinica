<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo os dados de todos os Convenios
        $convenios = Convenio::all();
        // chamando a tela e enviando o objeto $convenios como parâmetro
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // chamando a tela para o cadastro de Convenios
        return view ('convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // criando regras para validação
        $validateData = $request->validate([
            'nome_conv'         =>      'required|max:45',
            'fone_conv'         =>      'required|max:10',
            'site_conv'         =>      'required|max:35',
            'contato_conv'      =>      'required|max:25',
            'perccons_conv'     =>      'required|max:11',
            'percexame_conv'    =>      'required|max:11'
        ]);
        // executando o método para a gravação do registro
        $convenio = Convenio::create($validateData);
        // redirecionando para a tela principal do módulo de Convenios
        return redirect('/convenios')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // criando um objeto para receber o resultado da busca de registro/objeto específico
        $convenio = Convenio::findOrFail($id);
        // retornando a tela de visualização com o objeto recuperado
        return view('convenios.show',compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // criando um objeto para receber o resultado da busca de registro/objeto específico
        $convenio = Convenio::findOrFail($id);
        // retornando a tela de edição com o objeto recuperado
        return view('convenios.edit', compact('convenio'));
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
        // criando um objeto para testar/aplicar validações nos dados da requisição
        $validateData = $request->validate([
            'nome_conv'         =>      'required|max:45',
            'fone_conv'         =>      'required|max:10',
            'site_conv'         =>      'required|max:35',
            'contato_conv'      =>      'required|max:25',
            'perccons_conv'     =>      'required|max:11',
            'percexame_conv'    =>      'required|max:11'
        ]);
        // criando um objeto para receber o resultado da persistência (atualização) dos dados validados
        Convenio::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/convenios')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $convenio = Convenio::findOrFail($id);
        // realizando a exclusão
        $convenio->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/convenios')->with('success', 'Dados removidos com sucesso!');
    }
}
