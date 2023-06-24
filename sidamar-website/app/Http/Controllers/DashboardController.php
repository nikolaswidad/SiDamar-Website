<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\KasChart;
use App\Charts\UserChart;
use App\Charts\MerchChart;
use App\Models\finance;
use App\Models\BulanKas;
use App\Models\PembayaranKas;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(KasChart $kasChart, UserChart $userChart, MerchChart $merchChart) {
        //Financ
        //get total_cashin and total_cashout
        
        return view('dashboard.dashboard',[
            'kasChart' => $kasChart->build(),
            'userChart' => $userChart->build(),
            'merchChart' => $merchChart->build(),
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
