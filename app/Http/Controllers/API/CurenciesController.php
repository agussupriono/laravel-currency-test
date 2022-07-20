<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\currency_rates;

class CurenciesController extends BaseController
{

    public function currencies()
    {
        $maxDate = currency_rates::max('date');
        
        $currencies = currency_rates::where('date',$maxDate)->get(['code','name']);
        $ret = ["data" => $currencies];
        return $this->sendResponse($ret,'List Currency - Base EUR');
        
    }

    public function currency($code)
    {
        $maxDate = currency_rates::max('date');
        
        $currencies = currency_rates::where('date',$maxDate)
                      ->where('code',$code)
                      ->get(['code','name','rate','date']);
        $ret = ["data" => $currencies];
        return $this->sendResponse($ret,'Currency Rate - Base EUR');
        
    }

    public function createUpdate(Request $request) 
    {
        $this->validate($request,[
            'code' => 'required',
            'name' => 'required',
            'rate' => 'required'
        ]);

        $input = $request->all();
        if($input['date']==''){
            $input['date'] = Carbon\Carbon::now();
        }
        
        $find = currency_rates::where('code', $input['code'])
                ->where('date', $input['date'])
                ->first();
 
        if ($find !== null) {
            $curr->update(['name' => $input['name']],
                          ['rate' => $input['rate']],
                          ['date' => $input['date']]
                         )->where('code', $input['code'])
                         ->where('date', $input['date']);
        } else {
            $curr = currency_rates::create([
            'code' => $input['code'],
            'name' => $input['name'],
            'rate' => $input['rate'],
            'date' => $input['date'],
            ]);
        }

        $ret = ["data" => $curr];
        return $this->sendResponse($ret,'Create or Update Rate');
        
    }
    
}
