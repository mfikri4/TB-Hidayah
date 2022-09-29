<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Items;

class ItemsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = Items::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Barang',
            'data'    => $data  
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find ITEMS by ID
        $data = Items::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Barang',
            'data'    => $data 
        ], 200);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'category_id'           => 'required',
            'volume'                => 'required',        
            'price_purchase'        => 'required',
            'price_sell'            => 'required',
            'qty_stock'             => 'required',
            'qty_sold'              => 'required',
            'unit_id'               => 'required',
            'status'                => 'required'
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $data = Items::create([
            'name'                  => $request->name,
            'volume'                => $request->volume,
            'category_id'           => $request->category_id,      
            'price_purchase'        => $request->price_purchase,
            'price_sell'            => $request->price_sell,
            'qty_stock'             => $request->qty_stock,
            'qty_sold'              => $request->qty_sold,
            'unit_id'               => $request->unit_id,
            'status'                => $request->status
        ]);

        //success save to database
        if($data) {

            return response()->json([
                'success' => true,
                'message' => 'Data Created',
                'data'    => $data  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Data Failed to Save',
        ], 409);

    }

    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $data
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Items::make($request->all(), [
            'name'                  => 'required',
            'volume'                => 'required',
            'category_id'           => 'required',        
            'price_purchase'        => 'required',
            'price_sell'            => 'required',
            'qty_stock'             => 'required',
            'qty_sold'              => 'required',
            'unit_id'               => 'required',
            'status'                => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find Info Kuota by ID
        $data = Items::findOrFail($id);

        if($data) {

            //update Info Kuota
            $data->update([
                'name'                  => $request->name,
                'volume'                => $request->volume,
                'category_id'           => $request->category_id,      
                'price_purchase'        => $request->price_purchase,
                'price_sell'            => $request->price_sell,
                'qty_stock'             => $request->qty_stock,
                'qty_sold'              => $request->qty_sold,
                'unit_id'               => $request->unit_id,
                'status'                => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Info Items Updated',
                'data'    => $kuota  
            ], 200);

        }

        //data Items not found
        return response()->json([
            'success' => false,
            'message' => 'Info Items Not Found',
        ], 404);
    }


    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find Items by ID
        $data = Items::findOrfail($id);

        if($data) {

            //delete Items
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Info Items Deleted',
            ], 200);

        }

        //data Info Diklat not found
        return response()->json([
            'success' => false,
            'message' => 'Info Items Not Found',
        ], 404);
    }

}
