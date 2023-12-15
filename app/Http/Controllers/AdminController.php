<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Charts\ProductGradeChart;

class AdminController extends Controller
{
    //
    public function dashboard(ProductGradeChart $chart){

        $order = Order::all();
        $totalSale = 0;
        foreach($order as $order){

            // Check if the delivery status is not 'Canceled'
            if ($order->delivery_status !== 'Canceled') {
                $totalSale += $order->product_price;
            }
        }

         // Calculate total sales for the current month
         $currentMonth = Carbon::now()->startOfMonth();
         $monthlyOrders = Order::where('created_at', '>=', $currentMonth)->get();
         $saleMonthly = 0;
         foreach ($monthlyOrders as $order) {
             // Check if the delivery status is not 'Canceled'
             if ($order->delivery_status !== 'Canceled') {
                 $saleMonthly += $order->product_price;
             }
         }

        $totalOrder = Order::all()->count();       
        $preparingOrder = $order->where('delivery_status', 'Preparing')->count();
        $receiveOrder = $order->where('delivery_status', 'Received')->count();
        $cancelOrder = $order->where('delivery_status', 'Canceled')->count();
        $data['chart'] = $chart->build();

        
        return view('Admin.dashboard',compact('totalSale','saleMonthly','totalOrder','preparingOrder','receiveOrder','cancelOrder','data'));
    }
}
