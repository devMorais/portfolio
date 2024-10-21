<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {

        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'numeric'],
            'image' => ['required', 'max:5000', 'image'],
            'title' => ['required', 'max:200'],
            'description' => ['required']
        ]);

        $imagePatch = handleUpload('image');
        $blog = new Blog();

        $blog->category = $request->category;
        $blog->image =  $imagePatch;
        $blog->title = $request->title;
        $blog->description = $request->description;

        $blog->save();

        $notification = array(
            'message' => 'Operação realizada com sucesso!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.index')->with($notification);
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
        $categories = BlogCategory::all();
        $blog = Blog::findOrfail($id);
        return view('admin.blog.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required', 'numeric'],
            'image' => ['max:5000', 'image'],
            'title' => ['required', 'max:200'],
            'description' => ['required']
        ]);

        $blog = Blog::findOrFail($id);

        $imagePath = handleUpload('image', $blog);

        $blog->category = $request->category;
        $blog->image = (!empty($imagePath) ? $imagePath : $blog->image);
        $blog->title = $request->title;
        $blog->description = $request->description;

        $blog->save();
        $notification = array(
            'message' => 'Atualizado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        deleteFileIfExist($blog->image);
        $blog->delete();
    }
}
