<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\category;
use App\Models\template;
use App\Models\template_detail;


use Illuminate\Http\Request;
use App\Http\Requests\TemplateRequest;
use App\Http\Requests\TemplateCreateRequest;
use Illuminate\Validation\Rules\Exists;

class TemplateController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = template::all();
        return view('pages.admin.templates.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        $count = $category->count();
        return view('pages.admin.templates.create',[
            'category' => $category,
            'count' => $count
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateCreateRequest $request)
    {
        if($request->category_0 == $request->category_1)
        {  
            return redirect()->back()->withInput()->withErrors(['category' => 'Kategori Tidak Boleh Sama !!!']);
        }
        // $req = $request->all();
        // dd($req);

        $templates = template::create([
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'price' => $request->price
                    ]);


        $cat1 = $request->category_0;
        $cat2 = $request->category_1;
        $templates->categories()->attach([$cat1,$cat2]);
        
        $filename = $templates->slug . ".png";
        $photo = $request->file('photo')->store(
                    'assets/templates', $filename , 'public'
                );
        $templates->templateDetail()->create([
            'photo' => $photo,
            'description' => $request->description
        ]);

        return redirect()->route('templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = template::findOrFail($id);
        // dd($items->templateDetail()->get());

        $templates = $items->templateDetail()->get();
        $cat = $items->categories()->get();
        $categories = category::all();

        $j = $cat->count();
        $h = $categories->count();

        return view('pages.admin.templates.edit',[
            'items' => $items,
            'templates' => $templates,
            'categories' => $categories,
            'j' => $j,
            'h' => $h,
            'cat' => $cat
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, $id)
    {
        if($request->category_0 == $request->category_1)
        {  
            return redirect()->back()->withInput()->withErrors(['category' => 'Kategori Tidak Boleh Sama !!!']);
        }
        $req = $request->all();
        // dd($req);

        template::where('id', $id)
                ->update(
                    [
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'price' => $request->price
                    ]
                );

        $templates = template::findOrFail($id);
        $td = $templates->templateDetail()->get();

        // dd(File::get($td[0]->photo));

        // dd(public_path($td[0]->photo));

        // dd($td[0]);


        $cat1 = $request->category_0;
        $cat2 = $request->category_1;
        $templates->categories()->sync([$cat1,$cat2]);

        

        if($request->photo == null)
        {
            //'photo tidak ada';
            template_detail::where('template_id', $id)->update(
                [
                    'description' => $request->description
                ]);
        }

        else
        {
            unlink(public_path('storage/'.$td[0]->photo));
            $filename = $templates->slug . ".png";
            $photo = $request->file('photo')->storeAs(
                'assets/templates', $filename , 'public' 
            );
            template_detail::where('template_id', $id)->update(
                [
                    'description' => $request->description,
                    'photo' => $photo
                ]);
            
        }

        return redirect()->route('templates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = template::findOrFail($id);

        $items->categories()->detach();
        $items->templateDetail()->delete();
        $items->delete();

        return redirect()->route('templates.index');
    }
}
