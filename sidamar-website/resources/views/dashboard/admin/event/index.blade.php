@extends('dashboard.layouts.main')

@section('container')
   <h1 class="p-3">ini event untuk admin</h1>
   
   <a href="{{ route('events.create') }}" class="p-3 mt-2 bg-primary text-white rounded-lg hover:bg-primaryLighten">Create Event</a>

   <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead class="border-b">
                <tr>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    #
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Name
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Category
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Description
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Date
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Time
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Date Notification
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Location
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    URL
                  </th>
                </tr>
              </thead>
              <tbody>
               @foreach ($events as $event)                
                <tr class="border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     {{ $loop->iteration }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                     {{ $event->title }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                     {{ $event->category->name }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->description }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->date }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->time }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->date_notification }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->location }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap hover:text-primary">
                     <a href="{{ $event->url }}">
                        {{ $event->url }}
                     </a>
                  </td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

   <div class="mb-96"></div>
@endsection