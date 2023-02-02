@extends('dashboard.layouts.main')

@section('container')
   <h1>Ini Halaman category</h1>

   @foreach ($category as $cat)
      <ul>
         <li>{{ $cat->name }}</li>
      </ul>
      <table class="table-auto">
         <thead>
           <tr>
             <th>No</th>
             <th>Name</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>{{ $cat->id }}</td>
             <td>{{ $cat->name }}</td>
             <td>
               <a href=""><button class="rounded-full ">Edit</button></a>
               <a href=""><button class="rounded-full ">Delete</button></a>
             </td>
           </tr>
         </tbody>
       </table> 
   @endforeach
       
   <div class="mb-96"></div>
@endsection