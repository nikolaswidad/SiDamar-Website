<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\KasChart;
use App\Charts\UserChart;
use App\Charts\MerchChart;
use App\Charts\TotalUser;
use App\Charts\DonaturChart;
use App\Charts\KeaktifanChart;


use App\Models\finance;
use App\Models\BulanKas;
use App\Models\PembayaranKas;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(KasChart $kasChart, UserChart $userChart, MerchChart $merchChart, TotalUser $totalUserChart, DonaturChart $donaturChart, KeaktifanChart $keaktifanChart) {
        //get total cash in from finance
        $total_cash_in = 0;
        $finances = finance::all();
        foreach($finances as $finance){
            $total_cash_in += $finance->cashin;
        }
        //get total cash out from finance
        $total_cash_out = 0;
        $finances = finance::all();
        foreach($finances as $finance){
            $total_cash_out += $finance->cashout;
        }
        $sehat = $total_cash_in - $total_cash_out;
        //get total _kas
        $total_kas = 0;
        $bulanKas = BulanKas::all();
        foreach($bulanKas as $bulanKas){
            $total_kas += $bulanKas->total_terkumpul;
        }

        return view('dashboard.dashboard',[
            'kasChart' => $kasChart->build(),
            'userChart' => $userChart->build(),
            'merchChart' => $merchChart->build(),
            'totalUserChart' => $totalUserChart->build(),
            'donaturChart' => $donaturChart->build(),
            'keaktifanChart' => $keaktifanChart->build(),
            'total_cash_in' => $total_cash_in,
            'total_cash_out' => $total_cash_out,
            'sehat' => $sehat,
            'total_kas' => $total_kas,
        ]);
}

    // public function event(){
    //     return view('dashboard.event');
    // }

    // public function kas(){
    //     return view('dashboard.kas');
    // }

    // public function presensi(){
    //     return view('dashboard.kas');
    // }
}
