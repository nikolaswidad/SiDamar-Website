@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Buat Bulan Pembayaran Kas</h1>

<div class="max-w-xl">
    <form action="/dashboard/bulan_kas/" method="post" class="mt-8 mb-8">
        @csrf
        <div class="mb-3">
            <label for="bulan" class="form-label text-lg">Bulan</label>
            <input type="text" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan" required autofocus value="{{ old('bulan') }}">
            @error('bulan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label text-lg">Tahun</label>
            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" required value="{{ old('tahun') }}">
            @error('tahun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label text-lg">Kas per Bulan</label>
            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" required value="{{ old('tahun') }}">
            @error('tahun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </form>
</div>
@endsection