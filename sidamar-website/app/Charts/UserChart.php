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
        // dd($data, $label);
        return $this->chart->barChart()
            ->setTitle('Jumlah Pengguna')
            ->setSubtitle('Berdasarkan Tahun Bergabung')
            ->setWidth(400)
            ->setHeight(400)
            ->addData("Pengguna",$data)
            ->setLabels($label);
    }
}
