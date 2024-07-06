<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use TraitResponseMessage;
    public function index()
    {
        //
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
        $validated = $request->validate([
            'img_url' => 'required',
            'status' => 'required',
            'rate_sale' => 'required',
            'title_slider' => 'required',
            'subtitle_slider' => 'required',
            'from_cost' => 'required',
        ]);

        $slider = Slider::create($validated);

        if (!$slider) {
            return $this->responseSuccess('Create slider failed!', 400);
        }
        return $this->responseSuccess('Create slider success !', $slider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        try {
            $data = $request->all();
            $slider->fill($data);
            $slider->save();
            return $this->responseSuccess('Updated slider success!', $slider);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->responseError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            return $this->responseSuccess('Delete Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
