<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Charts\MonthlySalesChart;
use App\Charts\ProductGradeChart;

class AdminController extends Controller
{
    //
    public function dashboard(ProductGradeChart $chart, MonthlySalesChart $barchart){

        $orders = Order::all();
        $totalSale = 0;
        foreach($orders as $order){ // Change variable name to singular 'order' within the loop
    
            // Check if the delivery status is not 'Canceled'
            if ($order->delivery_status == 'Received') {
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
    
        $totalOrder = $orders->count();       
        $preparingOrder = $orders->whereIn('delivery_status', ['Preparing','Hold/Delayed'])->count();
        $receiveOrder = $orders->where('delivery_status', 'Received')->count();
        $cancelOrder = $orders->whereIn('delivery_status', ['Cancelled','Cancel'])->count();
        $data['chart'] = $chart->build();
        // $monthltData['chart'] = $barchart->build();
    
        
        return view('Admin.dashboard',compact('totalSale','saleMonthly','totalOrder','preparingOrder','receiveOrder','cancelOrder','data','orders'));
    }
}
