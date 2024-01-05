<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductGradeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $productGrade = Order::where('delivery_status', 'Received')->get();
        $data = [
            $productGrade -> where('product_grade','A')->count(),
            $productGrade -> where('product_grade','B')->count(),
            $productGrade -> where('product_grade','C')->count(),
        ];
        $label = [
            'Grade A',
            'Grade B',
            'Grade C',
        ];
        return $this->chart->donutChart()
            ->setTitle('Highest Sales By Grade')
            ->setSubtitle(date('Y'))
            ->setHeight(350)
            ->addData($data)
            ->setLabels($label);
    }
}
