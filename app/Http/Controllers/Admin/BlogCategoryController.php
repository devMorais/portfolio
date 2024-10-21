<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTables)
    {
        return $dataTables->render('admin.blog-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = \Str::slug($request->name);

        $blogCategory->save();

        $notification = array(
            'message' => 'Cadastrado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog-category.index')->with($notification);
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
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog-category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => ['required', 'max:200']
        ]);

        $Blogcategory = BlogCategory::findOrFail($id);

        $Blogcategory->name = $request->name;
        $Blogcategory->slug = \Str::slug($request->name);

        $Blogcategory->save();

        $notification = array(
            'message' => 'Categoria Atualizada com Sucesso!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $hasItem = Blog::where('category', $category->id)->count();
        if ($hasItem == 0) {
            $category->delete();
            return true;
        }
        return response(['status' => 'error']);
    }
}
