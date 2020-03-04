<?php

namespace App\Http\Controllers;

use App\Order;
use App\Place;
use App\Time;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @return mixed
     */
    public function getOrders()
    {
        return Order::orderBy('created_at')->get();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function orders()
    {
        return response()->json($this->getOrders());
    }

    public function create()
    {
        return response()->json([
            'place' => Place::get()->pluck('address', 'id'),
            'time' => Time::get()->pluck('time', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
           'place' => 'required|string',
           'time' => 'required|string',
           'phone' => 'required|string',
           'email' => 'required|email',
        ]);

        Order::create($request
            ->all());
        return response(['message'
        => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        return response()->json(['tableData' => Order::get()
            ->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();
        return response()->json(['message' => 'Success']);
    }
}
