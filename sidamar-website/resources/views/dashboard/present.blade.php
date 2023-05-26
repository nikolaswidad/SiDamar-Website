@extends('dashboard.layouts.main')

<?php include(app_path('Helpers/present_helpers.php')); ?>


@section('container')

@php
    //get type from 
@endphp
<div class="p-12 py-6">
    <div class="flex my-5 justify-between">
        <div>
            <h1 class="text-2xl font-bold">Riwayat Presensi</h1>
        </div>
    </div>
    <table class="min-w-full">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Acara
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Status
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Terakhir Update
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($eventData as $eventId => $event)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    {{ $event['title'] }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="">
                                <div class="{{ presentColorClass($event['type'])['color'] }}">
                                    {{ ucfirst($event['type']) }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-500">
                            {{ $event['updated_at'] }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection