<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageForm;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.language.index', [
            'languages' => Language::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageForm $request)
    {
        $language = new Language([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'status' => $request->get('status'),
        ]);

        $language->save();

        flash(__('Language created successfully.'), 'success');

        return redirect()->route('admin.language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageForm $request, Language $language)
    {
        $language->name = $request->input('name');
        $language->code = $request->input('code');
        $language->status = $request->input('status');

        $language->update();

        flash(__('Language updated successfully.'), 'success');

        return redirect()->route('admin.language.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if (1 == $language->id) {
            return redirect()->route('admin.language.index')->with('warning', 'not permission to delete');
        }

        $language->delete();

        flash(__('Language deleted successfully.'), 'success');

        return redirect()->route('admin.language.index');
    }
}
