<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        // dd($request->all());
        $validated = $request->validate([
            'img_url' => 'required',
            'status' => 'required',
            'title' => 'required',
            'title_1' => 'required',
            'title_2' => 'required',
            'sub_title' => 'required',
            'from_cost' => 'required',

        ]);

        $banner = Banner::create($validated);

        if (!$banner) {
            return $this->responseSuccess('Create banner failed!', 400);
        }
        return $this->responseError('Create banner success !');
    }

    public function show(Banner $banner)
    {
    }

    public function edit(Banner $banner)
    {
        //
    }

    public function update(Request $request, Banner $banner)
    {
        if (!$banner) {
            return $this->responseError('Banner is not found !');
        }
        try {
            $data = $request->all();
            $banner->fill($data);
            $banner->save();
            return $this->responseSuccess('Updated banner success!', $banner);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->responseError($th);
        }
    }

    public function destroy(Banner $banner)
    {
        if (!$banner) {
            return $this->responseError('Delete Failed!');
        }
        try {
            $banner->delete();
            return $this->responseSuccess('Delete Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
