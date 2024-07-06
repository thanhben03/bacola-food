<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\Counpon;
use Illuminate\Http\Request;

class CounponController extends Controller
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
        // dd($request->all());
        $validated = $request->validate([
            'code' => 'required',
            'status' => 'required',
            'rate' => 'required',
            'start_day' => 'required',
            'end_day' => 'required',
        ]);

        $counpon = Counpon::create($validated);

        if (!$counpon) {
            return $this->responseSuccess('Create counpon failed!', 400);
        }
        return $this->responseSuccess('Create counpon success !', $counpon);
    }

    public function show(Counpon $counpon)
    {
        //
    }

    public function edit(Counpon $counpon)
    {
        //
    }

    public function update(Request $request, Counpon $counpon)
    {
        try {
            $data = $request->all();
            $counpon->fill($data);
            $counpon->save();
            return $this->responseSuccess('Updated counpon success!', $counpon);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->responseError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counpon  $counpon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counpon $counpon)
    {
        try {
            $counpon->delete();
            return $this->responseSuccess('Delete Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
