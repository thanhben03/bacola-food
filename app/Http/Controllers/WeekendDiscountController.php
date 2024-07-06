<?php

namespace App\Http\Controllers;

use App\Models\WeekendDiscount;
use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Helper\TraitResponseMessage;

class WeekendDiscountController extends Controller
{
    use Helper,TraitResponseMessage;

    public function index()
    {
        return $this->getColumnNameTable('weekend_discounts');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'rate_sale' => 'required',
            'status' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'required',

        ]);

        $weekendDiscount = WeekendDiscount::create($validated);

        if (!$weekendDiscount) {
            return $this->responseSuccess('Create failed!', 400);
        }
        return $this->responseError('Create success !');
    }

    public function show(WeekendDiscount $weekendDiscount)
    {
        //
    }


    public function edit(WeekendDiscount $weekendDiscount)
    {
        //
    }


    public function update(Request $request, WeekendDiscount $weekendDiscount)
    {
        try {
            $data = $request->all();
            $weekendDiscount->fill($data);
            $weekendDiscount->save();
            return $this->responseSuccess('Updated success!', $weekendDiscount);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->responseError($th);
        }
    }

    public function destroy(WeekendDiscount $weekendDiscount)
    {
        try {
            $weekendDiscount->delete();
            return $this->responseSuccess('Delete Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
