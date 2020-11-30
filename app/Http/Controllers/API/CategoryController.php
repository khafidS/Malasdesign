<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');



        if($id)
        {
            $category = category::with('template')->find($id);

            if($category)
                return ResponseFormatter::success($category, 'Data category berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data category gagal diambil', 404);
        }


        $categories = category::with('template');

        if($name)
            $categories->where('name', 'like', '%' . $name . '%');

        return ResponseFormatter::success(
            $categories->paginate($limit),
            'Data List Category Berhasil diambil'
        );

    }
}
