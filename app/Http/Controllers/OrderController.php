<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trade;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(10); 

        return view('order.list', ['orders' => $orders]);
    }

    public function create($id)
    {
        // dd('in'.$id);
        $trade = Trade::findOrFail($id);
        $order = new Order();
        $order->trade_id = $trade->id;
        $order->quantity = $trade->quantity;
        $order->price_per_unit = $trade->price_per_unit;
        $order->status = 'created';
        $order->save();

        return redirect()->route('trade.index')->with('success', 'Order has been created successfully.');
    }


    public function update(Request $request, $id)
        {
            $order = Order::findOrFail($id);

            $validatedData = $request->validate([
                'status' => 'required|in:created,confirmed',
            ]);

            $order->status = $validatedData['status'];
            $order->save();

            return redirect()->route('order.index')->with('success', 'Order status has been updated successfully.');
        }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order has been successfully deleted.');
    }

}
