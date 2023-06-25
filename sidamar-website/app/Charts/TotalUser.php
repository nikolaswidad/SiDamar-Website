<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;

class TotalUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $user = User::get();
        // get data count based on tahun_bergabung
        $data = [];
        foreach ($user as $key => $value) {
            // count every tahun_bergabung
            $tahun_bergabung = $value->tahun_bergabung;
            foreach ($user as $key => $value) {
                if ($value->tahun_bergabung == $tahun_bergabung) {
                    $data[$tahun_bergabung] = User::where('tahun_bergabung', $tahun_bergabung)->count();
                }
            }
        }
        $label = [];
        // fill label with tahun_bergabung
        foreach ($user as $key => $value) {
            $label[] = $value->tahun_bergabung;
            if (count($label) == count($data)) {
                break;
            }
        }
        return $this->chart->barChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->setWidth(440)
            ->setHeight(370)
            ->addData('Total Pengguna',$data)
            ->setLabels($label);
    }
}
