<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Donation;
use App\Models\Donatur;

class DonaturChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        //get all donation
        $donation = Donation::get();
        foreach ($donation as $key => $value) {
            $donation_name[] = $value->title;
        }

        //count total money get from donatur based on each donation
        $donatur = Donatur::get();
        $total_donation = [];
        foreach ($donation as $key => $value) {
            $donation_id = $value->id;
            $total_donation[] = Donatur::where('donation_id', $donation_id)->sum('total');
        }
        // dd($total_donation, $donation_name);
        return $this->chart->barChart()
            ->setTitle('Donasi Event Si Damar')
            ->setSubtitle('Jumlah donasi yang didapat')
            ->setWidth(440)
            ->setHeight(370)
            ->setColors(['#CC5500'])
            ->addData('San Francisco', $total_donation)
            ->setXAxis($donation_name);
    }
}
