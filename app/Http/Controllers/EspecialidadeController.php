<?php

namespace App\Http\Controllers;

use App\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo os dados de todos as Especialidades
        $especialidades = Especialidade::all();
        // chamando a tela e enviando o objeto $especialidades como parâmetro
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // chamando a tela para o cadastro de Especialidades
        return view ('especialidades.create');
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
            'nome_esp'      =>      'required|max:45',
            'sigla_esp'     =>      'required|max:5',
            'obs_esp'       =>      'required|max:250'
        ]);
        // executando o método para a gravação do registro
        $especialidade = Especialidade::create($validateData);
        // redirecionando para a tela principal do módulo de Especialidades
        return redirect('/especialidades')->with('success','Dados adicionados com sucesso!');
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
        $especialidade = Especialidade::findOrFail($id);
        // retornando a tela de visualização com o objeto recuperado
        return view('especialidades.show',compact('especialidade'));
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
        $especialidade = Especialidade::findOrFail($id);
        // retornando a tela de edição com o objeto recuperado
        return view('especialidades.edit', compact('especialidade'));
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
            'nome_esp'      =>      'required|max:45',
            'sigla_esp'     =>      'required|max:5',
            'obs_esp'       =>      'required|max:250'
        ]);
        // criando um objeto para receber o resultado da persistência (atualização) dos dados validados
        Especialidade::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/especialidades')->with('success', 'Dados atualizados com sucesso!');
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
        $especialidade = Especialidade::findOrFail($id);
        // realizando a exclusão
        $especialidade->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/especialidades')->with('success', 'Dados removidos com sucesso!');
    }
}
