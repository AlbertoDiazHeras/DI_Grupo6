<?php

namespace almagest\Http\Controllers\API;

use Illuminate\Http\Request;
use almagest\Http\Controllers\Controller;
use almagest\Delivery_notes;
use Validator;

class DeliveryNotesController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'order_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $albaran = Delivery_notes::create($input);

        return response()->json(['Albaran' => $albaran->toArray()], $this->successStatus);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albaran = Delivery_notes::find($id);
        if (is_null($albaran)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Pedido' => $albaran->toArray()], $this->successStatus);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $albaran = Delivery_notes::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'order_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $albaran->num = $input['num'];
        $albaran->issue_date = $input['issue_date'];
        $albaran->order_id = $input['order_id'];
        $albaran->deleted = $input['deleted'];
        $albaran->save();

        return response()->json(['Albaran' => $albaran->toArray()], $this->successStatus);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albaran = Delivery_notes::findOrFail($id);

        $albaran->delete();

        return response()->json(['Albaran' => $albaran->toArray()], $this->successStatus);

    }
}
