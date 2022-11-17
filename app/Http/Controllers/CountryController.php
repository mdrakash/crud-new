<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;

class CountryController extends Controller
{
    public function index()
    {
        return view('country',['countries'=>Country::all()]);
    }
    public function store(Request $request)
    {
        $valided= \Validator::make($request->all(),[
            'country_name' => 'required|unique:countries',
            'country_city' => 'required',
        ]);
        if(!$valided->passes()){
            return response()->json([
                'code'=>0,
                'error'=>$valided->errors()->toArray(),
            ]);
        }
        try {
            Country::create($request->only(['country_name','country_city']));
            return response()->json([
                'code'=>1,
                'msg'=>'New Country Added'
            ]);
        } catch (\QueryException $th) {
            throw $th;
        }
    }

    public function show(Request $request)
    {
        // $countries = Country::all();
        if ($request->ajax()) {
            $data = Country::all();
            return Datatables::of($data)
                            ->addColumn('action',function($data){
                                return '<div class="btn-group">
                                            <button type="button" id="editBtn" class="btn btn-info" data-id="'.$data['id'].'">Edit</button>
                                            <button type="button" id="deleteBtn" class="btn btn-danger" data-id="'.$data['id'].'">Delete</button>
                                        </div>';
                            })
                            ->make(true);
        }
                    
    }

    public function edit(Request $request)
    {
        $country = $request->country_id;
        $country_data = Country::find($country);
        return response()->json([
            'details'=>$country_data
        ]);
    }

    public function update(Request $request)
    {
        $id=$request->country_id;
        $valided= \Validator::make($request->all(),[
            'country_id' => 'required',
            'country_name' => 'required|unique:countries,country_name,'.$id,
            'country_city' => 'required',
        ]);
        if(!$valided->passes()){
            return response()->json([
                'code'=>0,
                'error'=>$valided->errors()->toArray(),
            ]);
        }
        try {
            Country::findOrFail($id)->update($request->only(['country_name','country_city']));
            return response()->json([
                'code'=>1,
                'msg'=>'Country Updated'
            ]);
        } catch (\QueryException $th) {
            throw $th;
        }
    }
}
