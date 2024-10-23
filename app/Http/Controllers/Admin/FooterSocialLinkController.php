<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required'],
            'url' => ['required', 'url']
        ]);

        $socialLink = new FooterSocialLink();

        $socialLink->icon = $request->icon;
        $socialLink->url = $request->url;

        $socialLink->save();

        $notification = array(
            'message' => 'Operação Realizada!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.footer-social.index')->with($notification);
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
        $social = FooterSocialLink::findOrfail($id);
        return view('admin.footer-social-link.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required'],
            'url' => ['required', 'url']
        ]);

        $socialLink = FooterSocialLink::findOrfail($id);

        $socialLink->icon = $request->icon;
        $socialLink->url = $request->url;

        $socialLink->save();

        $notification = array(
            'message' => 'Operação Realizada!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.footer-social.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = FooterSocialLink::findOrFail($id);
        $social->delete();
    }
}
