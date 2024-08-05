<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    public function create()
    {
        return view('coupons.create');
    }

    public function save(Request $request)
    {
        $created = Discount::create([
            'title' => $request->title,
            'body' => $request->body,
            'percentage' => $request->percentage,
            'start' => $request->start,
            'end' => $request->end
        ]);
        if ($created) {
            return redirect(route('create-discounts'))->with('message', 'Coupon Save');
        }
    }

    public function all()
    {
        $discounts = Discount::orderBy('id', 'desc')->paginate();
//        dd($discounts);
        return view('coupons.index', compact('discounts'));
    }

    public function edit(Request $request)
    {
        $discount = Discount::find($request->id);
//        dd($discounts);
        return view('coupons.edit', compact('discount'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
//        dd($request->all());
        $discount = Discount::find($request->id);
        $discount->title = $request->title;
        $discount->body = $request->body;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->percentage = $request->percentage;
        $discount->save();
        return redirect()->route('all-discounts',['id' => $request->id])->with('success', 'Data Updated');
    }

    public function delete($id)
    {
        Discount::find($id)->delete();
        return redirect()->route('all-discounts')->with('success', 'Data Deleted');
    }
}
