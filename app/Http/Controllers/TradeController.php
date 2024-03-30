<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trade;
use App\Models\Order;

class TradeController extends Controller
{
    public function index(){
        $trades = Trade::paginate(10); 
        // dd($trades);
        return view('trade.list', ['trades' => $trades]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trade_date_time' => 'required|date',
            'stock_name' => 'required|string',
            'listing_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'type' => 'required|in:buy,sell',
            'price_per_unit' => 'required|numeric',
        ]);

        $trade = new Trade();
        $trade->trade_date_time = $validatedData['trade_date_time'];
        $trade->stock_name = $validatedData['stock_name'];
        $trade->listing_price = $validatedData['listing_price'];
        $trade->quantity = $validatedData['quantity'];
        $trade->type = $validatedData['type'];
        $trade->price_per_unit = $validatedData['price_per_unit'];

        $trade->save();

        return redirect()->route('trade.index')->with('success', 'Trade details have been successfully added.');
    }

    public function edit($id)
    {
        $trade = Trade::findOrFail($id);
        return view('trade.update', ['trade' => $trade]);
    }

    public function update(Request $request, $id)
    {
        $trade = Trade::findOrFail($id);

        // dd('in');
        $validatedData = $request->validate([
            'trade_date_time' => 'required|date',
            'stock_name' => 'required|string',
            'listing_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'type' => 'required|in:buy,sell',
            'price_per_unit' => 'required|numeric',
        ]);
        $trade->update($validatedData);

        return redirect()->route('trade.index')->with('success', 'Trade details have been successfully updated.');
    }

    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();

        return redirect()->route('trade.index')->with('success', 'Trade has been successfully deleted.');
    }
}


