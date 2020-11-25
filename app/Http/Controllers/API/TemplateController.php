<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateRequest;
use App\Models\template;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function all (Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('limit', 6);
        $slug = $request->input('slug');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');


        if($id)
        {
            $templates = template::with('categories', 'templateDetail')->find($id);

            if($templates)
                return ResponseFormatter::success($templates, 'data template berhasil di load !!');
            else
                return ResponseFormatter::error(null, 'data template gagal di load !!', 404);
        }


        if($slug)
        {
            $templates = template::with('categories', 'templateDetail')
                            ->where('slug', $slug)
                            ->first();
            if($templates)
                return ResponseFormatter::success($templates, 'data template berhasil di load !!');
            else
                return ResponseFormatter::error(null, 'data template gagal di load !!', 404);
        }

        $templates = template::with('categories', 'templateDetail');

        if($name)
            $templates->where('name', 'like', '%' . $name . '%');

        if($price_from)
            $templates->where('price', '>=', $price_from);

        if($price_to)
            $templates->where('price', '<=', $price_to);

        return ResponseFormatter::success(
            $templates->paginate($limit),
            'Data List Produk Berhasil diambil'
        );
    }
}
