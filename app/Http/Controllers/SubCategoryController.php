<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    use TraitResponseMessage;
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'slug' => 'required'
        // ]);
        $data = $request->all();

        try {
            $subCategory = SubCategory::create($data);
            return $this->responseSuccess('Created Success!', $subCategory);
        } catch (\Throwable $th) {
            return $this->responseError($th, 400);
        }
    }

    public function show(SubCategory $subCategory)
    {
        //
    }

    public function edit(SubCategory $subCategory)
    {
        //
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        try {
            $subCategory->fill($request->all());
            $subCategory->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Edit success!',
                'data' => $subCategory
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit error!',
                'error' => $th
            ], 400);
        }
    }

    public function destroy(SubCategory $subCategory)
    {
        if (!$subCategory) {
            
        }
    }
}
