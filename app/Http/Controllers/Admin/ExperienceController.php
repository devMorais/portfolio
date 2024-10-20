<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.experience.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['max:5000', 'image'],
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000'],
            'phone' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:100', 'email']
        ]);

        $experience = Experience::find($id);
        $imagePatch = handleUpload('image', $experience);

        Experience::updateOrCreate(
            ['id' => $id],
            [
                'image' => (!empty($imagePatch) ? $imagePatch : $experience->image),
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email
            ]

        );
        $notification = array(
            'message' => 'Atualizado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
