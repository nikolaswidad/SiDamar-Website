@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Selamat Datang, <span class="text-transparent bg-gradient-to-r from-red-500 to-orange-400 bg-clip-text">{{ Auth::user()->name }}</span></h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">

        <div class="lg:grid lg:grid-cols-4 gap-5">
            <div class="mt-5 bg-white border-l-4 border-red-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-sm font-bold text-red-500 uppercase mb-1">
                                Total Pemasukan
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $total_cash_in }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 bg-white border-l-4 border-orange-400 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-sm font-bold text-red-500 uppercase mb-1">
                                Total Pengeluaran
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $total_cash_out }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 bg-white border-l-4 border-orange-400 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-sm font-bold text-red-500 uppercase mb-1">
                                Total Kas
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $total_kas }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 bg-white border-l-4 border-orange-400 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-sm font-bold text-red-500 uppercase mb-1">
                                Keuangan
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $sehat }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-5 lg:grid lg:grid-cols-2 gap-5">
            {{-- <div class="mt-5 flex justify-start">
        
                <div class="p-6 bg-white rounded-xl shadow">
                    {!! $userChart->container() !!}
                </div>
                <script src="{{ $userChart->cdn() }}"></script>
                {{ $userChart->script() }}
        
            </div> --}}

            <div class="mt-5 flex justify-start">
        
                <div class="p-6 bg-white rounded-xl shadow">
                    {!! $kasChart->container() !!}
                </div>
                <script src="{{ $kasChart->cdn() }}"></script>
                {{ $kasChart->script() }}
        
            </div>
    
            <div class="mt-5 flex justify-start">
        
                <div class="p-6 bg-white rounded-xl shadow">
                    {!! $merchChart->container() !!}
                </div>
                <script src="{{ $merchChart->cdn() }}"></script>
                {{ $merchChart->script() }}
        
            </div>
            
            <div class="flex justify-start">

                <div class="p-6 bg-white rounded-xl shadow">
                    {!! $donaturChart->container() !!}
                </div>
                <script src="{{ $donaturChart->cdn() }}"></script>
                {{ $donaturChart->script() }}
            
            </div>

            <div class="flex justify-start">

                <div class="p-6 bg-white rounded-xl shadow">
                    {!! $keaktifanChart->container() !!}
                </div>
                <script src="{{ $keaktifanChart->cdn() }}"></script>
                {{ $keaktifanChart->script() }}
            
            </div>
            
            
        </div>
        <div class="mb-20"></div>
    </div>
@endsection