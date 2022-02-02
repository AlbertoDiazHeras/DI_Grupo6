<?php

namespace almagest\Http\Controllers\API;

use Illuminate\Http\Request;
use almagest\Http\Controllers\Controller;
use almagest\Invoice;
use Validator;

class InvoicesController extends Controller
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
            'delivery_note_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $factura = Invoice::create($input);

        return response()->json(['Factura' => $factura->toArray()], $this->successStatus);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Invoice::find($id);
        if (is_null($factura)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Factura' => $factura->toArray()], $this->successStatus);

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
        $factura = Invoice::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'delivery_note_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $factura->num = $input['num'];
        $factura->issue_date = $input['issue_date'];
        $factura->delivery_note_id = $input['delivery_note_id'];
        $factura->deleted = $input['deleted'];
        $factura->save();

        return response()->json(['Factura' => $factura->toArray()], $this->successStatus);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura = Invoice::findOrFail($id);

        $factura->delete();

        return response()->json(['Factura' => $factura->toArray()], $this->successStatus);

    }
}
