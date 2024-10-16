<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $dataTable)
    {
        return $dataTable->render('admin.typer-title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typer-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $title = new TyperTitle();
        $title->title = $request->title;

        $title->save();
        $notification = array(
            'message' => 'Título Criado com Sucesso!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.typer-title.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = TyperTitle::findOrFail($id);
        return view('admin.typer-title.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $title = TyperTitle::findOrFail($id);
        $title->title = $request->title;

        $title->save();
        $notification = array(
            'message' => 'Título Atualizado com Sucesso!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.typer-title.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $title = TyperTitle::findOrFail($id);
        $title->delete();
    }
}
