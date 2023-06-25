<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Merch;
use App\Models\Customer;

class MerchChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // get all merchandises
        $beli = Customer::get();
        $merch = Merch::get();

        $merch_name=[];
        // get all merchandise name
        foreach ($merch as $key => $value) {
            $merch_name[] = $value->title;
        }
        // dd($merch_name);
        //get data customer based on merchandises
        $jumlah_beli = [];
        foreach ($merch as $key) {
            $merch_id = $key->id;
            $jumlah_beli[] = Customer::where('merch_id', $merch_id)->count();
        }
        // dd($jumlah_beli, $merch_name);
        // dd($jumlah_beli);
        return $this->chart->barChart()
            ->setTitle('Penjualan Merchandise')
            ->setSubtitle('Penjualan dalam satu bulan terakhir')
            ->setWidth(440)
            ->setHeight(300)
            ->setColors(['#db7f07'])
            ->addData('Merchandise', $jumlah_beli)
            ->setXAxis($merch_name);
    }
}
