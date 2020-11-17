<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TemplateDetailRequest;
use App\Models\template_detail;
use App\Models\template;
use App\Models\category;

class TemplateDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // dd($items);
        $templates = template::findOrFail($id);
        $items = $templates->templateDetail()->get();
        
        return view('pages.admin.templates.show-image', [
            'items' => $items
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function templateDetail($id)
    {
        $templates = template::findOrFail($id);
        $categories = $templates->categories()->get(); //category keluar

        $items = $templates->templateDetail()->get(); //deskripsi keluar
        // dd($items);

        return view('pages.admin.templates.show', [
            'categories' => $categories,
            'items' => $items
        ]);
        // dd($categories);
    }
}
