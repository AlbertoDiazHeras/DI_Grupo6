<?php

namespace almagest\Http\Controllers\API;

use Illuminate\Http\Request;
use almagest\Http\Controllers\Controller;
use almagest\Order;
use Validator;

class OrdersController extends Controller

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
            'origin_company_id' => 'required',
            'target_company_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $order = Order::create($input);

        return response()->json(['Pedido' => $order->toArray()], $this->successStatus);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Pedido' => $order->toArray()], $this->successStatus);

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
        $pedido = Order::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'origin_company_id' => 'required',
            'target_company_id' => 'required',
            'deleted' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $pedido->num = $input['num'];
        $pedido->issue_date = $input['issue_date'];
        $pedido->origin_company_id = $input['origin_company_id'];
        $pedido->target_company_id = $input['target_company_id'];
        $pedido->deleted = $input['deleted'];
        $pedido->save();

        return response()->json(['Pedido' => $pedido->toArray()], $this->successStatus);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Order::findOrFail($id);

        $pedido->delete();

        return response()->json(['Pedido' => $pedido->toArray()], $this->successStatus);

    }
}
