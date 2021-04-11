@extends('layouts.myApp')
@section('title', 'Products')
@section('content')
   <body class="flex items-center justify-center">
   <div class="container px-6 mx-auto">
       <br>
       <p class="text-lg">All products:</p>
       <hr>
       @if(Session::has('updated_mess'))
           <h3 class="bg-green-200">{{session('updated_mess')}}</h3>
       @endif
       @if(Session::has('delete'))
           <h3 class="bg-green-200">{{session('delete')}}</h3>
       @endif
       <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
           <thead class="">
           <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
               <th class="p-3 text-left">ID</th>
               <th class="p-3 text-left">Name</th>
               <th class="p-3 text-left">Photo</th>
               <th class="p-3 text-left">Description</th>
               <th class="p-3 text-left">Price</th>
               <th class="p-3 text-left" width="110px">Delete</th>
               <th class="p-3 text-left" width="110px">Edit</th>
           </tr>
           </thead>
           <tbody class="flex-1 sm:flex-none">
           @if(count($products))
               @foreach($products as $product)
                   <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                       <td class="border-grey-light border hover:bg-gray-100 p-3">{{$product->id}}</td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$product->name}}</td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><img width="100px" src="{{$product->photo ? $product->photo->file : "http://via.placeholder.com/100x100"}}" alt=""></td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$product->description}}</td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$product->price}}</td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                           <form action="{{route('product.destroy', ['product'=>$product->id])}}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button>Delete</button>
                            </form>
                       </td>
                       <td class="border-grey-light border hover:bg-gray-100 p-3 text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer">
                           <form action="{{route('product.edit', ['product'=>$product->id])}}" method="POST">
                               @csrf
                               @method('GET')
                                <button>Edit</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
           @else
               <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                   <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">No products there</td>
               </tr>
           @endif
           </tbody>
       </table>
   </div>
   </body>
   <style>
       html,
       body {
           height: 100%;
       }

       @media (min-width: 640px) {
           table {
               display: inline-table !important;
           }

           thead tr:not(:first-child) {
               display: none;
           }
       }

       td:not(:last-child) {
           border-bottom: 0;
       }

       th:not(:last-child) {
           border-bottom: 2px solid rgba(0, 0, 0, .1);
       }
   </style>

@stop
