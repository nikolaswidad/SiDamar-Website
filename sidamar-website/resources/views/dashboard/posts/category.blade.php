@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">Post category</h1>


      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Action</th>
           </tr>
         </thead>
         
         <tbody>
   @foreach ($category as $cat)
           <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $cat->id }}</td>
            <td class="px-6 py-4">{{ $cat->name }}</td>
            <td class="px-6 py-4">
               <a href=""class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><button class="rounded-full ">Edit</button></a>
               <a href=""class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><button class="rounded-full ">Delete</button></a>
             </td>
           </tr>
   @endforeach           
         </tbody>
       </table> 

       
   <div class="mb-96"></div>
@endsection