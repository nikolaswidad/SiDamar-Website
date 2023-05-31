@extends('dashboard.layouts.main')

<?php include(app_path('Helpers/present_helpers.php')); ?>

@section('container')
    @php
    //get type
    @endphp
    <div class="py-6">
        <div class="flex my-5 justify-between">
            <div>
                <h1 class="text-2xl font-bold">Riwayat Presensi</h1>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Acara
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Terakhir Update
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($eventData as $eventId => $event)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                        {{ $event['title'] }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="{{ presentColorClass($event['type'])['color'] }}">
                                        {{ ucfirst($event['type']) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-500">
                                {{ $event['updated_at'] }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
