<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{
    //

    public function index(){

        $order=Order::paginate(10);
        return view('Order.index',compact('order'));
    }

    public function delivered($id){

        $order=Order::find($id);
        $order->delivery_status = "Delivered";

        $order->save();

        Alert::success('Order deliver successfully.');

        return redirect()->back();
    }

    public function hold_delayed($id){

        $order=Order::find($id);
        $order->delivery_status = "Hold/Delayed";

        $order->save();

        Alert::success('Order update successfully.');

        return redirect()->back();
    }

    public function admin_cancel($id){

        $order=Order::find($id);
        $order->delivery_status = "Cancel";

        $order->save();

        Alert::success('Order cancel successfully.');

        return redirect()->back();
    }

    public function show($id){

        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();
        $order=Order::where('orderid',$id)->first();
        return view('Order.show',compact('order'));

    }
}
