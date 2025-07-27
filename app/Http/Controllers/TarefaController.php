<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required'
        ]);
        Tarefa::create($request->only('titulo'));
        return redirect()->route('tarefas.index')->with('success','Tarefa criada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.edit',compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa, $id)
    {
        //
        $request->validate(['titulo' => 'required']);
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->only('titulo'));
        return redirect()->route('terefas.index')->with('success', 'Tarefa Atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa,$id)
    {
        //
        Tarefa::findOrFail($id)->delete();
        return redirect()->route('tarefas.index')->with('succes','Tarefa removida!');

    }

    public function concluir($id){
      $tarefa = Tarefa::findOrFail($id);
        // Inverte o status da tarefa
        $tarefa->concluido = !$tarefa->concluida;
        $tarefa->save();
        return redirect()->route('tarefas.index')->with('Success','Status da tarefa atualizado');
    }
}
