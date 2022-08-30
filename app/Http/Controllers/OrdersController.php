<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showOrders()
    {
        $data = Order::all();

        return view("orders.orders", [
            "active" => "orders",
            "data" => $data
        ]);
    }

    public function showAddOrder()
    {
        return view("orders.addOrder", [
            "active" => "orders",
            "data" => Item::all(),
            "customers" => Customer::all()
        ]);
    }

    public function addOrder(Request $request)
    {
        dd($request->all());
    }
}
