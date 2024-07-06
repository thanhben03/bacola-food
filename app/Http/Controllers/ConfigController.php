<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Helper\TraitResponseMessage;

class ConfigController extends Controller
{
    
    use Helper,TraitResponseMessage;

    public function index()
    {
        return $this->getColumnNameTable('configs');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo_url' => 'required',
            'us_phone' => 'required',
            'store_notice' => 'required',
            'counpon_first_purchase' => 'required',
            'df_benefit1' => 'required',
            'df_benefit2' => 'required',
            'df_benefit3' => 'required',
            'get_freeship' => 'required',
        ]);

        try {
            $configs = Config::create($validated);
            return $this->responseSuccess('Change config success!', $configs);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function show(Config $config)
    {
        //
    }

    public function edit(Config $config)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        try {
            $data = $request->all();
            $config->fill($data);
            $config->save();

            return $this->responseSuccess('Change config success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        try {
            $config->delete();
            return $this->responseSuccess('Change config success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
