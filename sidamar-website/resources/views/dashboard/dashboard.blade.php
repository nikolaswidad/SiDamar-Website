@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Selamat Datang, <span class="text-transparent bg-gradient-to-r from-red-500 to-orange-400 bg-clip-text">{{ Auth::user()->name }}</span></h1>
        
        <hr class="bg-slate-200 mt-5 max-w-lg">
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
            <script src="{{ $kasChart->cdn() }}"></script>
            {{ $merchChart->script() }}
    
        </div>
    </div>
@endsection