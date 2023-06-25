<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Event;
use App\Models\Present;

class KeaktifanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        //get all event with type event and production
        $event = Event::where('category', 'Event')->orWhere('category', 'Production')->get();
        foreach ($event as $event){
            $event_id = $event->id;
            $event_name[] = $event->title;
            $total_present[] = Present::where('event_id', $event_id)->where('type', 'hadir')->count();
        }
        // dd($event_name, $total_present);
        return $this->chart->pieChart()
            ->setTitle('Keaktifan Anggota Si Damar')
            ->setSubtitle('Seberapa aktif anggota Si Damar dalam kegiatan')
            ->setWidth(440)
            ->setHeight(300)
            ->setColors(['#FF4500', '#FF6F00', '#72a308', '#FFA500', '#a4c75a', '#ebb434'])
            ->addData($total_present)
            ->setLabels($event_name);
    }
}
