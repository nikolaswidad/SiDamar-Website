<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;

class UserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $user = User::get();
        // get data count based on tahun_bergabung
        $data = [];
        foreach ($user as $key => $value) {
            // count every tahun_bergabung
            $tahun = $value->tahun_bergabung;
            $data[] = User::where('tahun_bergabung', $tahun)->count();
        }
        $label = [];
        // fill label with tahun_bergabung
        foreach ($user as $key => $value) {
            $label[] = $value->tahun_bergabung;
        }
        return $this->chart->donutChart()
            ->setTitle('Grafi Jumlah Pengguna')
            ->setSubtitle('Berdasarkan Tahun Bergabung')
            ->setWidth(500)
            ->setHeight(300)
            ->setXAxis($label)
            ->addData($data);
    }
}
