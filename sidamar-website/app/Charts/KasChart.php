<?php

namespace App\Charts;

use App\Models\BulanKas;
use App\Http\Controllers;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KasChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $kas = BulanKas::get();
        // get data total_terkumpul
        $data = [];
        foreach ($kas as $key => $value) {
            // add data to array
            $data[] = $value->total_terkumpul;
        }
        $label = [];
        // fill label with bulan and tahun
        foreach ($kas as $key => $value) {
            $label[] = $value->bulan . ' ' . $value->tahun;
        }
        return $this->chart->barChart()
        ->setFontFamily('Montserrat')
        ->setTitle('Bulan Kas')
        ->setSubtitle('Total terkumpul dari semua bulan kas')
        ->setWidth(500)
        ->setHeight(300)
        ->setColors(['#ffa500'])
        ->setXAxis($label)
        ->addData('Total Terkumpul', $data);
    }
}
