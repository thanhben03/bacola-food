<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Helper\TraitResponseMessage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use TraitResponseMessage;
    public function index()
    {
        return '123';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $category = Category::create($validated);

        if (!$category) {
            return $this->responseSuccess('Create category failed!', 400);
        }
        return $this->responseError('Create category success !');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required'
        ]);
        $category->fill($validated);
        $category->save();
        if (!$category) {
            return $this->responseError('Update category failed !');
        }
        return $this->responseSuccess('Updated category success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category) {
            return $this->responseError('Delete Failed!');
        }
        return $this->responseSuccess('Delete Success!');
    }
}
