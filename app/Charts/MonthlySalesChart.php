<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlySalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $currentYear = now()->year;

        $monthlySales = Order::selectRaw('DATE_FORMAT(created_at, "%M %Y") as month, SUM(product_price) as total_sales')
            ->whereYear('created_at', $currentYear)
            ->where('delivery_status', 'Received') // Add this line to filter by delivery_status
            ->groupBy('month')
            ->get();

        $data = $monthlySales->pluck('total_sales')->toArray();
        $labels = $monthlySales->pluck('month')->toArray();

        return $this->chart->barChart()
            ->setTitle('Monthly Sales Based on Product Price')
            ->setSubtitle('Sales per month(RM)')
            ->setHeight(350)
            ->addData('Monthly Sales (RM)', $data)
            ->setLabels($labels);
    }
}
